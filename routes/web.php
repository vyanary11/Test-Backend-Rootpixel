<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing.home');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('landing.blog');
    Route::get('/{slug}.html', [App\Http\Controllers\BlogController::class, 'show'])->name('landing.single-blog');
});

Route::group(['prefix' => 'desain'], function () {
    Route::get('/', [App\Http\Controllers\DesignController::class, 'index'])->name('landing.desain');
    Route::get('/{slug}.html', [App\Http\Controllers\DesignController::class, 'show'])->name('landing.single-desain');
});

Route::get('/pages/{slug}.html', [App\Http\Controllers\HomeController::class, 'pages'])->name('landing.pages');
