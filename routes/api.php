<?php

namespace App\Http\Controllers;

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

// Create a Route Group
Route::group(['prefix' => 'v1'], function () {
    // Create a Users Route resource
    Route::post('users/change_pin',[UserController::class,'changePin']);
    Route::post('users/close',[UserController::class,'close']);
    Route::post('users/balance', [UserController::class,'getBalance']);

    Route::resource('users', UserController::class);
    Route::post('games/play', [GamesController::class,'play']);
    Route::get('games/results',[GamesController::class, 'results']);
    Route::resource('games', GamesController::class);
});
