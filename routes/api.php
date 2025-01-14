<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\PostController;
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

### AUTH ###
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth:sanctum']], function () {
    ### POSTS ###
    Route::apiResource('posts', PostController::class);

    ### EXCHANGE RATE ###
    Route::get('/exchange-rates', [ExchangeRateController::class, 'index'])->name('allow.exchange.rate');

    ### USER ###
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

