<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::get('/messages/with/{user}', 'Api\\MessagesController@listMessages');
    Route::post('/messages/to/{receiver}', 'Api\\MessagesController@createMessage');
    Route::get('/me', 'Api\\UsersController@me');
    Route::get('/users', 'Api\\UsersController@listUsers');
});

