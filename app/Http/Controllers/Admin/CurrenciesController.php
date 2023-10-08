<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Validator;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $frd = $request->all();

        $frd['sort'] = $frd['sort'] ?? '-id';

        $items = Currency::filter($frd)->paginate(10);
        $seo = new SEOData(
            title: 'Валюты'
        );
        $data = compact('frd', 'seo', 'items');

        if ($request->isJson()) return $data;
        return view("Html::admin.pages.currencies.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $seo = new SEOData(
            title: 'Создание валюты'
        );
        $data = compact('seo');
        if ($request->isJson()) return $data;
        return view("Html::admin.pages.currencies.create", $data);
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
    public function show(Request $request, Currency $item): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $seo = new SEOData(
            title: 'Валюта "' . $item->label . '"'
        );
        $data = compact('seo', 'item');
        if ($request->isJson()) return $data;
        return view("Html::admin.pages.currencies.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Currency $item): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $seo = new SEOData(
            title: 'Редактирование валюты "' . $item->label . '"'
        );
        $data = compact('seo', 'item');
        if ($request->isJson()) return $data;
        return view("Html::admin.pages.currencies.edit", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function copy(Request $request, Currency $item): View|\Illuminate\Foundation\Application|Factory|array|Application
    {
        $seo = new SEOData(
            title: 'Копирование валюты "' . $item->label . '"'
        );
        $data = compact('seo', 'item');
        if ($request->isJson()) return $data;
        return view("Html::admin.pages.currencies.copy", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $item)
    {
        return $this->save($request, $item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Currency $item): Currency|RedirectResponse
    {
        $item->delete();
        if ($request->isJson()) return $item;
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function selectedDestroy(Request $request): int|RedirectResponse
    {
        $ids = $request->input('selected', []);
        $data = Currency::whereIn('id', $ids)->delete();

        if ($request->isJson()) return $data;
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    protected function save(Request $request, Currency $item = null)
    {
        $isCreate = !$item;
        $item = $item ?? new Currency();

        $rules = $item->getValidateRules();
        $validator = Validator::make($request->only(array_keys($rules)), $rules);
        $anchor = $request->input('anchor');

        if ($validator->fails()) {
            if ($request->isJson()) return $validator->errors();

            $redirect = redirect()
                ->to(url()->previous())
                ->withErrors($validator)
                ->withInput();
            if ($anchor) $redirect->withFragment($anchor);
            return $redirect;
        }

        if ($isCreate) $item = Currency::create($validator->validated());
        else $item->update($validator->validated());

        if ($request->isJson()) return $item;

        $redirect = redirect()->to(url()->previous());
        if ($anchor) $redirect->withFragment($anchor);
        return $redirect;
    }
}
