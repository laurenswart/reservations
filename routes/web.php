<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocalityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artist', [ArtistController::class, 'index'])->name('artist_index');
Route::get('/artist/{id}', [ArtistController::class, 'show'])
	->where('id', '[0-9]+')->name('artist_show');


Route::get('/type', [TypeController::class, 'index'])->name('type_index');
Route::get('/type/{id}', [TypeController::class, 'show'])
    ->where('id', '[0-9]+')->name('type_show');

Route::get('/locality', [LocalityController::class, 'index'])->name('locality_index');
Route::get('/locality/{id}', [LocalityController::class, 'show'])
    ->where('id', '[0-9]+')->name('locality_show');

