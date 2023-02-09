<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessoryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('accessories', [AccessoryController::class, 'list']);
Route::get('accessories/{id}', [AccessoryController::class, 'list']);
Route::post('add', [AccessoryController::class, 'add']);
Route::put('update', [AccessoryController::class, 'update']);
Route::delete('delete/{id}', [AccessoryController::class, 'delete']);
Route::get('search/{name}', [AccessoryController::class, 'search']);
    });


Route::post("login",[UserController::class,'index']);


