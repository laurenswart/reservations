<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


//ARTISTS
Route::get('/artists', [ArtistController::class, 'index'])->name('artists_index');
Route::get('/artists/{id}', [ArtistController::class, 'show'])
	->where('id', '[0-9]+')->name('artists_show');
Route::get('/artists/edit/{id}', [ArtistController::class, 'edit'])
	->where('id', '[0-9]+')->name('artists_edit');
Route::put('/artists/{id}', [ArtistController::class, 'update'])
	->where('id', '[0-9]+')->name('artists_update');

//TYPES
Route::get('/types', [TypeController::class, 'index'])->name('types_index');
Route::get('/types/{id}', [TypeController::class, 'show'])
    ->where('id', '[0-9]+')->name('types_show');
Route::get('/types/edit/{id}', [TypeController::class, 'edit'])
	->where('id', '[0-9]+')->name('types_edit');
Route::put('/types/{id}', [TypeController::class, 'update'])
	->where('id', '[0-9]+')->name('types_update');

//LOCALITIES
Route::get('/localities', [LocalityController::class, 'index'])->name('localities_index');
Route::get('/localities/{id}', [LocalityController::class, 'show'])
    ->where('id', '[0-9]+')->name('localities_show');
Route::get('/localities/edit/{id}', [LocalityController::class, 'edit'])
	->where('id', '[0-9]+')->name('localities_edit');
Route::put('/localities/{id}', [LocalityController::class, 'update'])
	->where('id', '[0-9]+')->name('localities_update');

Route::get('/roles', [RoleController::class, 'index'])->name('roles_index');
Route::get('/roles/{id}', [RoleController::class, 'show'])
    ->where('id', '[0-9]+')->name('roles_show');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])
    ->where('id', '[0-9]+')->name('roles_edit');
Route::put('/roles/{id}', [RoleController::class, 'update'])
    ->where('id', '[0-9]+')->name('roles_update');

Route::get('locations', [LocationController::class, 'index'])->name('locations_index');
Route::get('locations/{id}', [LocationController::class, 'show'])
    ->where('id', '[0-9]+')->name('locations_show');

Route::get('/representations', [RepresentationController::class, 'index'])
    ->name('representations_index');
Route::get('/representations/{id}', [RepresentationController::class, 'show'])
    ->where('id', '[0-9]+')->name('representations_show');

Route::get('/shows', [ShowController::class, 'index'])
    ->name('shows_index');
Route::get('/shows/{id}', [ShowController::class, 'show'])
    ->where('id', '[0-9]+')->name('shows_show');

Route::get('/reservations/{id}', [ReservationController::class, 'show'])
    ->where('id', '[0-9]+')->name('reservations_show');
Route::get('/reservations/edit/{id}', [ReservationController::class, 'edit'])
    ->where('id', '[0-9]+')->name('reservations_edit');

Route::get('/dashboard', function () {
    return view('welcome');
    })->middleware(['auth'])->name('dashboard');


Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories_index');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])
    ->where('id', '[0-9]+')->name('categories_edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])
	->where('id', '[0-9]+')->name('categories_update');
Route::get('/categories/create', [CategoryController::class, 'create'])
	->name('categories_create');
Route::post('/categories/{id}', [CategoryController::class, 'save'])
	->where('id', '[0-9]+')->name('categories_save');

require __DIR__.'/auth.php';
