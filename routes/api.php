<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\HelloWorldController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')
    ->controller(HelloWorldController::class)->group(
        function () {
            Route::get('/hello', 'hello');
            Route::post('/hello', 'store');
        }
    )
    ->controller(BandController::class)->group(
        function () {
            Route::get('/bands', 'list');
            Route::get('/bands/{id}', 'get');
            Route::post('/bands', 'store');
        }
    );
