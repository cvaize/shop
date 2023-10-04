<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $frd = $request->all();

        $frd['sort'] = $frd['sort'] ?? '-id';

        $items = Currency::filter($frd)->paginate(10);
        $seo = new SEOData(
            title: 'Валюты'
        );
        $data = compact('frd', 'seo', 'items');

        if ($request->isJson()) return $data;
        return view("Html::admin.pages.currencies", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Currency::create($request->all());
        return redirect()->route('admin.currencies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function copy(Currency $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $item): RedirectResponse
    {
        $item->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroySelected(Request $request): RedirectResponse
    {
        $ids = $request->input('selected', []);
        Currency::whereIn('id', $ids)->delete();

        return redirect()->back();
    }
}
