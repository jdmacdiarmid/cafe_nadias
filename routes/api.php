<?php

use Illuminate\Http\Request;

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

/**
 * auth:api uses "token" authentication by default.
 * Allows constructing a universal api for a completely separate app (web or mobile) or
 * for third-party integration with your system.
 *
 * Can set up an API using Laravel/Passport which is installed using Composer
 * Laravel/Passport is a complete oAuth2 server and API authentication package.
 * "Passport" comes with migrations but they are not placed in the normal migrations folder.
 */
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/categories/upsert', 'CategoryController@upsert');
Route::delete('/categories/{category}', 'CategoryController@destroy');
