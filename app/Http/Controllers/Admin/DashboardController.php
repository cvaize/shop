<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $seo = new SEOData(
            title: 'Панель'
        );
        $data = compact('seo');

        if($request->isJson()) return $data;
        return view("Html::admin.pages.dashboard", $data);
    }
}
