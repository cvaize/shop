<?php

namespace App\Http\Controllers\Html\Admin\Default;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $r): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('html.admin.default.pages.dashboard');
    }
}
