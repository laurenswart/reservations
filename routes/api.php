<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ShowController;
use App\Http\Controllers\Api\ShowController;
use App\Http\Controllers\Api\AutheaController;



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

// Route::get('/shows', [ShowController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::get('/shows', [ShowController::class, 'index']);
Route::get('/shows/{id}', [ShowController::class, 'show']);
Route::get('/shows/search/{title}', [ShowController::class, 'search']);



Route::group(['middleware'=>['auth:sanctum']], function () {
Route::post('/shows', [ShowController::class, 'store']);
Route::put('/shows/{id}', [ShowController::class, 'update']);
Route::delete('/shows/{id}', [ShowController::class, 'destroy']);
Route::get('/shows/search/{title}', [ShowController::class, 'search']);

});
