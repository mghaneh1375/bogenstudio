<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PN\ProductController;
use App\Http\Controllers\PN\NewsController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/admin-panel')->middleware('auth:api')->group(function () {

    Route::apiResource('/contact', ContactController::class)->only(['index', 'destroy']);

    Route::get('/contact/unseen', [ContactController::class, 'getCountUnSeen'])->name('contact.unseen');


    Route::apiResource('/seo', SeoController::class)->only(['index', 'show']);

    Route::post('/seo/{seo}', [SeoController::class, 'update']);
    
    Route::post('/seo/{section}/{additionalId}', [SeoController::class, 'store']);


    Route::apiResource('/product', ProductController::class)->except(['create', 'edit', 'update']);

    Route::post('/product/{product}', [ProductController::class, 'update']);


    Route::apiResource('/news', NewsController::class)->except(['create', 'edit', 'update']);

    Route::post('/news/{news}', [NewsController::class, 'update']);


    Route::apiResource('/solution', SolutionController::class)->except(['create', 'edit', 'update']);

    Route::post('/solution/{solution}', [SolutionController::class, 'update']);


    Route::apiResource('/model', ModelController::class)->except(['create', 'edit', 'update']);

    Route::post('/model/{model}', [ModelController::class, 'update']);


    Route::apiResource('/model', ModelController::class)->except(['create', 'edit', 'update']);

    Route::post('/model/{model}', [ModelController::class, 'update']);


    Route::apiResource('/video', VideoController::class)->except(['create', 'edit', 'update']);

    Route::get('/video/showAdmin/{video}', [VideoController::class, 'showAdmin'])->name('video.showAdmin');

    Route::post('/video/{video}', [VideoController::class, 'update'])->name('video.update');
    
    Route::post('isValidVideo', [VideoController::class, 'isValid'])->name('video.isValid');

    Route::post('addVideoFile', [VideoController::class, 'addFile'])->name('video.addVideo');

    Route::post('uploadTest', [HomeController::class, 'uploadTest'])->name('uploadTest');

});


Route::prefix('/{lang}')->group(function () {

    Route::get('/product/{organized?}', [ProductController::class, 'index']);

    Route::get('/product/show/{product}', [ProductController::class, 'showToUser']);

    Route::get('/video/show/{video}', [VideoController::class, 'show']);

    Route::get('videos/{limit?}', [VideoController::class, 'index']);

    Route::get('news/{limit?}', [NewsController::class, 'index']);

    Route::get('solutions', [SolutionController::class, 'index']);

    Route::get('solution/show/{solution}', [SolutionController::class, 'showWithLang']);


});

Route::post('contactMe', [ContactController::class, 'store'])->name('contactMe');

Route::get('model', [ModelController::class, 'index']);

Route::post('doLogin', [HomeController::class, 'doLogin'])->name('doLogin');
