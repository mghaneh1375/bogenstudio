<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    return Redirect::to('/en/home');
});

Route::get('/about', function () {
    return Redirect::to('/en/about');
});

Route::post('contactMe', [HomeController::class, 'contactMe'])->name('contactMe');

Route::get('changeLang/{lang}', [HomeController::class, 'changeLanguage'])->name('changeLang');

Route::prefix('{locale}')->middleware('checkLang')->group(function () {

    Route::get('/', function ($locale) {
        return Redirect::to($locale . '/home');
    });

    Route::get('/home', function () {
        return view('welcome');
    })->name('home');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/products', function () {
        return view('products');
    })->name('products');

    Route::get('/product/{productId}', function ($productId) {
        return view('product', ['productId' => $productId]);
    })->name('product');

    Route::get('/news', function () {
        return view('allNews');
    })->name('allNews');

    Route::get('/news/{newsId}', function ($newsId) {
        return view('news', ['newsId' => $newsId]);
    })->name('news');

    Route::get('/solutions', function () {
        return view('solutions');
    })->name('solutions');

});
