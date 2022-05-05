<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ShowController;
use App\Http\Controllers\Api\ShowController;


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

Route::resource('shows', ShowController::class);
Route::get('/shows/search/{title}', [ShowController::class, 'search']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
