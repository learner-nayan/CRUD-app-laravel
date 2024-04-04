<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CampusController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\UserController;

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

// //table route
// Route::get('/campuses/index', [CampusController::class, 'index'])->name('campuses.index');

// //create-form routes
// Route::get('/campuses/create', [CampusController::class, 'create'])->name('campuses.create');
// Route::post('/campuses/create', [CampusController::class, 'store'])->name('campuses.store');

// //edit-form routes
// Route::get('/campuses/{campus}/edit', [CampusController::class, 'edit'])->name('campuses.edit');

// //update-form routes
// Route::put('/campuses/{campus}/update', [CampusController::class, 'update'])->name('campuses.update');

// //delete route
// Route::delete('/campuses/{campus}/delete', [CampusController::class, 'delete'])->name('campuses.delete');

// //delete-confirmation routes
// Route::get('/campuses/{campus}/delete-confirmation', [CampusController::class, 'deleteConfirmation'])->name('campuses.delete_confirmation');



//CRUD routes using Resource
Route::resource('campuses', CampusController::class)->except('show');
Route::resource('computers', ComputerController::class)->except('show');


//register
Route::group(['prefix'=>'users', 'as'=>'users.'], function(){
    Route::get('register', [UserController::class, 'register'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('store');
});
// Route::get('users/register', [UserController::class, 'register'])->name('users.register');
// Route::post('users/register', [UserController::class, 'store'])->name('users.store');

//login
Route::get('login', [UserController::class, 'loginForm'])->name('loginForm');
Route::post('login', [UserController::class, 'login'])->name('login');

Route::group(['middleware'=>['auth']], function() {
    Route::get('home', [UserController::class, 'home'])->name('home');
});
// Route::get('home', [UserController::class, 'home'])->name('home')->middleware('auth');

//logout
Route::post('logout', [UserController::class, 'logout'])->name('logout');
