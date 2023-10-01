<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
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

Route::redirect('/', '/admin');
Route::prefix('/admin')->name('admin.')->group(function (){
    Route::redirect('/', '/admin/dashboard')->name('index');
    Route::get('/dashboard', DashboardController::class)->name('dashboard.index');
    Route::resource('users', UsersController::class);
    Route::resource('roles', UsersController::class);
    Route::resource('products', UsersController::class);
});
