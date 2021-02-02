<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('dashboard.home')->middleware('auth:dashboard');
Route::get('/profile', [App\Http\Controllers\Dashboard\HomeController::class, 'profile'])->name('dashboard.profile')->middleware('auth:dashboard');

Route::group(['prefix' => 'blog', 'middleware' => ['auth:dashboard']], function () {
    Route::get('/', [App\Http\Controllers\Dashboard\BlogController::class, 'index'])->name('dashboard.blog');
    Route::get('/update/{id}', [App\Http\Controllers\Dashboard\BlogController::class, 'show'])->middleware('ajax');
    Route::post('/update/{id}', [App\Http\Controllers\Dashboard\BlogController::class, 'update'])->name('dashboard.blog.update');
    Route::post('/store', [App\Http\Controllers\Dashboard\BlogController::class, 'store'])->name('dashboard.blog.store');
    Route::delete('/delete', [App\Http\Controllers\Dashboard\BlogController::class, 'delete'])->middleware('ajax');
    Route::get('/data_table_server_side', [App\Http\Controllers\Dashboard\BlogController::class, 'data_table_server_side'])->middleware('ajax');

});

Route::group(['prefix' => 'user', 'middleware' => ['auth:dashboard']], function () {
    Route::get('/', [App\Http\Controllers\Dashboard\UserUndanganController::class, 'index'])->name('dashboard.user');
    Route::get('/update/{id}', [App\Http\Controllers\Dashboard\UserUndanganController::class, 'show'])->middleware('ajax');
    Route::post('/update/{id}', [App\Http\Controllers\Dashboard\UserUndanganController::class, 'update'])->name('dashboard.user.update');
    Route::post('/store', [App\Http\Controllers\Dashboard\UserUndanganController::class, 'store'])->name('dashboard.user.store');
    Route::delete('/delete', [App\Http\Controllers\Dashboard\UserUndanganController::class, 'delete'])->middleware('ajax');
    Route::get('/data_table_server_side', [App\Http\Controllers\Dashboard\UserUndanganController::class, 'data_table_server_side'])->middleware('ajax');
});
