<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminShowController;


use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AdminRepresentationController;

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

//SEARCH
Route::get('/search', [ShowController::class, 'search']);
 Route::get('/show-list', [ShowController::class, 'show_list']);

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
Route::get('/addlocality', [LocalityController::class, 'addlocality'])->name('add_locality');
Route::post('/savelocality', [LocalityController::class, 'store'])->name('save_locality');
Route::get('/editlocality/{id}', [LocalityController::class, 'edit'])->name('edit_locality');
Route::post('/updatelocality/{id}', [LocalityController::class, 'update'])->name('update_locality');
Route::get('/deletelocality/{id}', [LocalityController::class, 'destroy'])->name('delete_locality');







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

// Route::get('/reservations/edit/{id}', [CategoryController::class, 'edit'])->name('admin_category');


// Admin Routes //
Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');



    Route::prefix('categories')->group(function(){

        Route::get('/manage', [CategoryController::class, 'IndexCategory'])->name('manage-category')->middleware('admin');

        Route::get('/edit/{id}',[CategoryController::class, 'EditCategory'])->name('category-edit')->middleware('admin');

        Route::post('/update',[CategoryController::class, 'UpdateCategory'])->name('category-update');

        Route::post('/add',[CategoryController::class, 'AddCategory'])->name('category-add');

        Route::get('/delete/{id}',[CategoryController::class, 'DeleteCategory'])->name('category-delete');

    });


    Route::prefix('representations')->group(function () {

        Route::get('/manage', [AdminRepresentationController::class, 'ViewRepresentation'])->name('manage-representations');

        Route::get('/edit/{id}', [AdminRepresentationController::class, 'EditRepresentation'])->name('admin-representation-edit');

        Route::post('/update', [AdminRepresentationController::class, 'UpdateRepresentation'])->name('admin-representation-update');

        Route::get('/delete/{id}', [AdminRepresentationController::class, 'DeleteRepresentation'])->name('admin-representation-delete');

        Route::get('/add', [AdminRepresentationController::class, 'AddRepresentations'])->name('admin-representation-add');

        Route::post('/store', [AdminRepresentationController::class, 'StoreRepresentations'])->name('admin-representation-store');



    Route::prefix('shows')->group(function(){

        Route::get('/manage', [AdminShowController::class, 'index'])->name('manage-show')->middleware('admin');

        Route::get('/edit/{id}', [AdminShowController::class, 'edit'])->name('admin-show-edit')->middleware('admin');

        Route::post('/update', [AdminShowController::class, 'update'])->name('admin-show-update');

        Route::get('/add', [AdminShowController::class, 'add'])->name('admin-show-add');

        Route::post('/store', [AdminShowController::class, 'store'])->name('admin-show-store');

        Route::get('/delete/{id}', [AdminShowController::class, 'delete'])->name('admin-show-delete');

    });

});

// End Admin Routes //


// Admin Shows Route //



//End Admin Shows Route

require __DIR__.'/auth.php';

