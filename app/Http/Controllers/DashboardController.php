<?php

namespace App\Http\Controllers;

use App\Enums\Template;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class DashboardController extends Controller
{
    public function __invoke(Request $r, Template $template): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $seo = new SEOData(
            title: 'Dashboard'
        );
        return view('html.admin.default.pages.dashboard', compact('seo'));
    }
}
