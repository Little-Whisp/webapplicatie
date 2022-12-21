<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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
//routes

Route::get('/', [HomeController::class, 'view'])->name('artworks');
Route::get('/artworks', [ArtworkController::class, 'view'])->name('artworks');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

#Create artwork(admin)
Route::get('/artworks/create', [App\Http\Controllers\ArtworkController::class, 'create'])->name('artworks.create');
Route::post('/artworks/store', [App\Http\Controllers\ArtworkController::class, 'store'])->name('artworks.store');

//Edit artwork (admin)
Route::get('/artworks/store/{id}', [App\Http\Controllers\ArtworkController::class, 'edit'])->name('artworks.edit');
Route::put('/artworks/update/{artwork}', [App\Http\Controllers\ArtworkController::class, 'update'])->name('artworks.update');
Route::get('/artworks/edit/{artwork}', [App\Http\Controllers\ArtworkController::class, 'edit'])->name('artworks.edit');

//Delete artwork (admin)
Route::get('/artworks/destroy/{id}', [App\Http\Controllers\ArtworkController::class, 'destroy'])->name('artworks.destroy');

// View Artworks
Route::get('/artworks/view/{artwork}', [App\Http\Controllers\ArtworkController::class, 'view'])->name('artworks.view');

//Users (Public)
Route::get('/users/profile', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/{user}/verify', [UserController::class, 'verifyUser'])->name('users.verify-user');

//Users (public)
Route::post('/users/{user}/verify', [UserController::class, 'verifyUser'])->name('users.verify-user');

//Artworks (public)
Route::resource('/artwork', ArtworkController::class)->names('artworks');
Route::post('/artwork/search', [ArtworkController::class, 'search'])->name('artworks.search');

//Categories (Public)
Route::resource('/categories', CategoryController::class)->names('categories');

Route::middleware(['auth', 'verified'])->group(function () {
});
//Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');

    //Artworks (Admin)
    Route::post('/{artwork}/toggle-visibility', [ArtworkController::class, 'toggleVisibility'])->name('artworks.toggle-visibility');
});











