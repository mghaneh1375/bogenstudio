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

Route::get('/news', function () {
    return Redirect::to('/en/news');
});

Route::get('/solutions', function () {
    return Redirect::to('/en/solutions');
});

Route::get('changeLang/{lang}', [HomeController::class, 'changeLanguage'])->name('changeLang');

Route::view('/login', 'panel.login')->name('login');

Route::prefix('admin-panel')->group(function () {

    Route::get('/', function () {
        return view('panel/home');
    })->name('admin.home');


    Route::view('seo', 'panel.seo.index')->name('admin.seo');
    
    Route::get('seo/{section}/{mode}/{seoId}', function ($section, $mode, $seoId) {
        return view('panel.seo.show', compact('seoId', 'mode', 'section'));
    });

    Route::view('news', 'panel.news.index')->name('admin.news');

    Route::view('addNews', 'panel.news.store')->name('admin.news.store');

    Route::get('news/{newsId}', function ($newsId) {
        return view('panel.news.show', compact('newsId'));
    });


    Route::view('solutions', 'panel.solution.index')->name('admin.solutions');

    Route::view('addSolution', 'panel.solution.store')->name('admin.solution.store');

    Route::get('solution/{solutionId}', function ($solutionId) {
        return view('panel.solution.show', compact('solutionId'));
    });


    Route::view('contacts', 'panel.contact.index')->name('admin.contacts');


    Route::view('models', 'panel.model.index')->name('admin.models');

    Route::view('addModel', 'panel.model.store')->name('admin.model.store');

    Route::get('model/{modelId}', function ($modelId) {
        return view('panel.model.show', compact('modelId'));
    });



    Route::view('videos', 'panel.video.index')->name('admin.videos');

    Route::view('addVideo', 'panel.video.store')->name('admin.video.store');

    Route::get('video/{videoId}', function ($videoId) {
        return view('panel.video.show', compact('videoId'));
    });



    Route::view('products', 'panel.product.index')->name('admin.products');

    Route::view('addProduct', 'panel.product.store')->name('admin.product.store');

    Route::get('product/{productId}', function ($productId) {
        return view('panel.product.show', compact('productId'));
    });


    Route::get('logout', [HomeController::class, 'logout'])->name('logout');

    Route::view('changePass', 'panel.changePass')->name('changePass');
});

Route::prefix('{locale}')->middleware('checkLang')->group(function () {

    Route::get('/', function ($locale) {
        return Redirect::to($locale . '/home');
    });

    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::view('/about', 'about')->name('about');

    Route::get('/products', [HomeController::class, 'products'])->name('products');
    
    Route::get('/news', [HomeController::class, 'news'])->name('allNews');
    
    Route::get('/solutions', [HomeController::class, 'solutions'])->name('solutions');

    Route::get('/product/{productId}', [HomeController::class, 'product'])->name('product');

    Route::get('/solution/{solutionId}', [HomeController::class, 'solution'])->name('solution');

    Route::get('/video/{videoId}', [HomeController::class, 'video'])->name('video');

});
