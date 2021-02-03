<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;

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

Route::group(['middleware' => ['auth:dashboard']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard.home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('dashboard.profile');

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('dashboard.blog');
        Route::get('/update/{id}', [BlogController::class, 'show'])->name('dashboard.blog.update-show');
        Route::post('/update/{id}', [BlogController::class, 'update'])->name('dashboard.blog.update');
        Route::get('/create', [BlogController::class, 'create'])->name('dashboard.blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('dashboard.blog.store');
        Route::delete('/delete', [BlogController::class, 'delete'])->middleware('ajax');

        Route::post('/update_selected', [BlogController::class, 'update_selected'])->middleware('ajax');
        Route::delete('/delete_selected', [BlogController::class, 'delete_selected'])->middleware('ajax');
        Route::get('/count_data', [BlogController::class, 'count_data'])->middleware('ajax');
        Route::get('/data_table_server_side', [BlogController::class, 'data_table_server_side'])->middleware('ajax');

    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('dashboard.user');
        Route::get('/update/{id}', [UserController::class, 'show'])->middleware('ajax');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('dashboard.user.update');
        Route::post('/store', [UserController::class, 'store'])->name('dashboard.user.store');
        Route::delete('/delete', [UserController::class, 'delete'])->middleware('ajax');
        Route::get('/data_table_server_side', [UserController::class, 'data_table_server_side'])->middleware('ajax');
    });

});
