<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('model', ModelController::class);

Route::prefix('/{lang}')->group(function () {

    Route::apiResource('/product', ProductController::class)->only('index');

    Route::get('videos/{limit?}', [VideoController::class, 'index']);

});

Route::apiResource('product', ProductController::class)->only('store', 'show', 'destroy', 'update');

Route::apiResource('video', VideoController::class)->only('store', 'destroy', 'update');


