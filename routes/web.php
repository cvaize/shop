<?php

use App\Http\Controllers\Admin\CurrenciesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$adminResources = [
    'users' => UsersController::class,
    'currencies' => CurrenciesController::class,
    'languages' => LanguagesController::class,
    'products' => ProductsController::class
];

Route::redirect('/', '/admin');
Route::prefix('/admin')->name('admin.')->group(function () use (&$adminResources) {
    Route::redirect('/', '/admin/dashboard')->name('index');
    Route::get('/dashboard', DashboardController::class)->name('dashboard.index');

    foreach ($adminResources as $name => $class) {
        Route::get("/$name", [$class, 'index'])->name("$name.index");
        Route::get("/$name/create", [$class, 'create'])->name("$name.create");
        Route::get("/$name/{item}/copy", [$class, 'copy'])->name("$name.copy");
        Route::get("/$name/{item}/edit", [$class, 'edit'])->name("$name.edit");
        Route::post("/$name/store", [$class, 'store'])->name("$name.store");
        Route::post("/$name/selected/destroy", [$class, 'selectedDestroy'])->name("$name.selectedDestroy");
        Route::post("/$name/{item}/update", [$class, 'update'])->name("$name.update");
        Route::post("/$name/{item}/destroy", [$class, 'destroy'])->name("$name.destroy");
    }
});
