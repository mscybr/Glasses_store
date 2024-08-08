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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    // informing all controllers that this request is an api
    $request["is_api"] = true;
    Route::post('login', 'UserController@authenticate');
    Route::post('logout', 'UserController@logout');

    Route::post('refresh', 'UserController@refresh')->middleware(['auth:api']);
    Route::post('me', 'UserController@me')->middleware(["auth:api"]);

});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
