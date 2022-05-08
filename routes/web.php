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

Route::view('/login', 'panel.login')->name('login');

Route::prefix('admin-panel')->group(function () {

    Route::get('/', function () {
        return view('panel/home');
    })->name('admin.home');

    Route::view('news', 'panel.news')->name('admin.news');

    Route::view('models', 'panel.models')->name('admin.model');

    Route::view('products', 'panel.product.index')->name('admin.products');

    Route::view('addProduct', 'panel.product.store')->name('admin.product.store');

    Route::get('product/{productId}', function ($productId) {
        return view('panel.product.show', compact('productId'));
    });

    Route::view('contacts', 'panel.contacts')->name('admin.contacts');

    Route::get('logout', [HomeController::class, 'logout'])->name('logout');

    Route::view('changePass', 'panel.changePass')->name('changePass');
});

Route::prefix('{locale}')->middleware('checkLang')->group(function () {

    Route::get('/', function ($locale) {
        return Redirect::to($locale . '/home');
    });

    Route::view('/home', 'welcome')->name('home');

    Route::view('/about', 'about')->name('about');

    Route::view('/products', 'products')->name('products');

    Route::view('/news', 'allNews')->name('allNews');

    Route::view('/solutions', 'solutions')->name('solutions');

    Route::get('/product/{productId}', function ($productId) {
        return view('product', ['productId' => $productId]);
    })->name('product');

    Route::get('/news/{newsId}', function ($newsId) {
        return view('news', ['newsId' => $newsId]);
    })->name('news');

});
