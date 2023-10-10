<?php

namespace App\Http\Controllers;

use App\Interfaces\ResourceForm;
use App\Interfaces\ResourceModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Validator;

abstract class ResourceController extends Controller
{
    abstract protected function getModel(): ResourceModel|Model;

    abstract protected function getForm(Request $request, ResourceModel|Model $item): ResourceForm;

    protected function getPageDir(): string
    {
        return 'Html::admin.pages.entities';
    }

    protected function getIndexSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Список'
        );
    }

    protected function getCreateSeo(Request $request): SEOData
    {
        return new SEOData(
            title: 'Создание'
        );
    }

    /**
     * @param Request $request
     * @param ResourceModel|Model $item
     * @return SEOData
     */
    protected function getShowSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Страница'
        );
    }

    protected function getEditSeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Редактирование'
        );
    }

    protected function getCopySeo(Request $request, ResourceModel|Model $item): SEOData
    {
        return new SEOData(
            title: 'Копирование'
        );
    }

    protected function getCreateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Создана запись в таблице ' . $item->getTable() . ' #' . $item->getKey();
    }

    protected function getUpdateSuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Обновлена запись в таблице ' . $item->getTable() . ' #' . $item->getKey();
    }

    protected function getDestroySuccessMessage(Request $request, ResourceModel|Model $item): string
    {
        return 'Удалена запись в таблице ' . $item->getTable() . ' #' . $item->getKey();
    }

    protected function getSelectedDestroySuccessMessage(Request $request, array $ids): string
    {
        return 'Удалены записи в таблице ' . $this->getModel()->getTable() . ' #' . implode(', ', $ids);
    }

    protected function getIndexFields(): array
    {
        return ['filter', 'page', 'per_page', 'fields', 'sort', 'selected', 'selected_all_page'];
    }

    protected function loadRelationship(Request $request, array $data): array
    {
        return $data;
    }

    /**
     * @param Request $request
     * @return View|\Illuminate\Foundation\Application|Factory|array|RedirectResponse|Application
     */
    public function index(Request $request): mixed
    {
        $frd = $request->only($this->getIndexFields());

        $frd['sort'] = $frd['sort'] ?? '-id';

        $isSelectedAllPage = isset($frd['selected_all_page']);
        if ($isSelectedAllPage) {
            $frd['page'] = $frd['selected_all_page'];
            unset($frd['selected_all_page']);
        }

        /** @var \Illuminate\Pagination\LengthAwarePaginator $items */
        $items = $this->getModel()::filter($frd)->paginate($frd['per_page'] ?? 10, ['*'], 'page', $frd['page'] ?? 1);

        $seo = $this->getIndexSeo($request);
        $data = compact('frd', 'seo', 'items');

        $data = $this->loadRelationship($request, $data);

        if ($request->isJson()) return $data;

        if ($isSelectedAllPage) {
            $item = $this->getModel();
            \Session::flash('selected', $items->pluck($item->getKeyName()));
            return redirect()->to(url()->current() . '?' . http_build_query($frd));
        }

        if ($items->count() === 0 && $items->currentPage() > 1) {
            $frd['page'] = $items->currentPage() - 1;
            return redirect()->to(url()->current() . '?' . http_build_query($frd));
        }

        $pageDir = $this->getPageDir();
        return view("$pageDir.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $seo = $this->getCreateSeo($request);
        $data = compact('seo');
        $data = $this->loadRelationship($request, $data);
        if ($request->isJson()) return $data;
        $pageDir = $this->getPageDir();
        return view("$pageDir.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        return $this->save($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $item): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $item = $this->getModel()::findOrFail($item);
        $seo = $this->getShowSeo($request, $item);
        $data = compact('seo', 'item');
        $data = $this->loadRelationship($request, $data);
        if ($request->isJson()) return $data;
        $pageDir = $this->getPageDir();
        return view("$pageDir.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $item): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $item = $this->getModel()::findOrFail($item);
        $seo = $this->getEditSeo($request, $item);
        $data = compact('seo', 'item');
        $data = $this->loadRelationship($request, $data);
        if ($request->isJson()) return $data;
        $pageDir = $this->getPageDir();
        return view("$pageDir.edit", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function copy(Request $request, int $item): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $item = $this->getModel()::findOrFail($item);
        $seo = $this->getCopySeo($request, $item);
        $data = compact('seo', 'item');
        $data = $this->loadRelationship($request, $data);
        if ($request->isJson()) return $data;
        $pageDir = $this->getPageDir();
        return view("$pageDir.copy", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $item)
    {
        $item = $this->getModel()::findOrFail($item);
        return $this->save($request, $item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $item)
    {
        $item = $this->getModel()::findOrFail($item);
        $item->delete();
        if ($request->isJson()) return $item;
        \Session::flash('success', $this->getDestroySuccessMessage($request, $item));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function selectedDestroy(Request $request): int|RedirectResponse
    {
        $item = $this->getModel();
        $ids = $request->input('selected', []);
        $data = $this->getModel()::whereIn($item->getKeyName(), $ids)->delete();

        if ($request->isJson()) return $data;
        \Session::flash('success', $this->getSelectedDestroySuccessMessage($request, $ids));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    protected function save(Request $request, ResourceModel $item = null)
    {
        $isCreate = !$item;
        $item = $item ?? $this->getModel();
        $form = $this->getForm($request, $item);

        $rules = $form->getValidateRules();
        $rulesKeys = array_keys($rules);
        $validator = Validator::make($request->only($rulesKeys), $rules);
        $anchor = $request->input('anchor');

        if ($validator->fails()) {
            if ($request->isJson()) return $validator->errors();

            $redirect = redirect()
                ->to(url()->previous())
                ->withErrors($validator)
                ->withInput($request->only([...$rulesKeys, '_action']));
            if ($anchor) $redirect->withFragment($anchor);
            return $redirect;
        }

        if ($isCreate) $item = $item::create($validator->validated());
        else $item->update($validator->validated());

        if ($request->isJson()) return $item;

        if ($isCreate) \Session::flash('success', $this->getCreateSuccessMessage($request, $item));
        else \Session::flash('success', $this->getUpdateSuccessMessage($request, $item));

        $redirect = redirect()->to(url()->previous());
        if ($anchor) $redirect->withFragment($anchor);
        return $redirect;
    }
}
