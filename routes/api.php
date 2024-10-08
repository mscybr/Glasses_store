<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


    Route::post('login', [UserController::class, "authenticate"]);
    Route::post('register', [UserController::class, "store"]);
    Route::post('logout', [UserController::class , "logout"])->middleware(['auth:api']);

    Route::post('refresh', [UserController::class , "refresh"])->middleware(['auth:api']);
    Route::post('me', [UserController::class , "me"])->middleware(["auth:api"]);

});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
