<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowController;

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

Route::get('/artists', [ArtistController::class, 'index'])->name('artists_index');
Route::get('/artists/{id}', [ArtistController::class, 'show'])
	->where('id', '[0-9]+')->name('artists_show');
Route::get('/artists/edit/{id}', [ArtistController::class, 'edit'])
	->where('id', '[0-9]+')->name('artists_edit');
Route::put('/artists/{id}', [ArtistController::class, 'update'])
	->where('id', '[0-9]+')->name('artists_update');


Route::get('/types', [TypeController::class, 'index'])->name('type_index');
Route::get('/types/{id}', [TypeController::class, 'show'])
    ->where('id', '[0-9]+')->name('type_show');

Route::get('/localities', [LocalityController::class, 'index'])->name('locality_index');
Route::get('/localities/{id}', [LocalityController::class, 'show'])
    ->where('id', '[0-9]+')->name('locality_show');

Route::get('/roles', [RoleController::class, 'index'])->name('role_index');
Route::get('/roles/{id}', [RoleController::class, 'show'])
    ->where('id', '[0-9]+')->name('role_show');

Route::get('locations', [LocationController::class, 'index'])->name('location_index');
Route::get('locations/{id}', [LocationController::class, 'show'])
->where('id', '[0-9]+')->name('location_show');

Route::get('/representations', [RepresentationController::class, 'index'])
->name('representation_index');
Route::get('/representations/{id}', [RepresentationController::class, 'show'])
->where('id', '[0-9]+')->name('representation_show');

Route::get('/shows', [ShowController::class, 'index'])
->name('show_index');
Route::get('/shows/{id}', [ShowController::class, 'show'])
->where('id', '[0-9]+')->name('show_show');






