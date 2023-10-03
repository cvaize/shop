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

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/copy', [UsersController::class, 'copy'])->name('users.copy');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
    Route::post('/users/selected/destroy', [UsersController::class, 'destroySelected'])->name('users.destroySelected');
    Route::post('/users/{user}/update', [UsersController::class, 'update'])->name('users.update');
    Route::post('/users/{user}/destroy', [UsersController::class, 'destroy'])->name('users.destroy');

    Route::resource('roles', UsersController::class);
    Route::resource('products', UsersController::class);
});
