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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('frontend.home');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('frontend.blog');
    Route::get('/blog/{slug}.html', [App\Http\Controllers\BlogController::class, 'show'])->name('frontend.single-blog');
});
