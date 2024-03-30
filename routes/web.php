<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CampusController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//table route
Route::get('/index', [CampusController::class, 'index'])->name('campuses.index');

//create-form routes
Route::get('/campuses/create', [CampusController::class, 'create'])->name('campuses.create');
Route::post('/campuses/create', [CampusController::class, 'store'])->name('campuses.store');

//edit-form routes
Route::get('/campuses/{id}/edit', [CampusController::class, 'edit'])->name('campuses.edit');

//update-form routes
Route::put('/campuses/{id}/update', [CampusController::class, 'update'])->name('campuses.update');

//delete route
Route::delete('/campuses/{id}/delete', [CampusController::class, 'delete'])->name('campuses.delete');

//delete-confirmation routes
Route::get('/campuses/{id}/delete-confirmation', [CampusController::class, 'delete_confirmation'])->name('campuses.delete_confirmation');

