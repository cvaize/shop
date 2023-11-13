<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $seo = new SEOData(
            title: 'Поиск'
        );
        $frd = $request->only(['search']);
        $users = User::search($frd['search'])->paginate();
        $data = compact('seo', 'frd', 'users');

        if($request->isJson()) return $data;
        return view("Html::admin.pages.search", $data);
    }
}
