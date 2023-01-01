<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/home', [HomeController::class, 'show'])->name('home');

Auth::routes();

Route::get('/about', [AboutController::class, 'show'])->name('about');

//Users (Public)
Route::get('/users/profile', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/{user}/verify', [UserController::class, 'verifyUser'])->name('users.verify-user');

//Artworks (Public)
Route::resource('/portfolio', ArtworkController::class)->names('artworks');
Route::post('/portfolio/search', [ArtworkController::class, 'search'])->name('artworks.search');

//Categories (Public)
Route::resource('/categories', CategoryController::class)->names('categories');

Route::middleware(['auth', 'verified'])->group(function () {
});

//Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    //Users (Admin)
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');

    //Artworks (Admin)
    Route::post('/portfolio/{artwork}/toggle-visibility', [ArtworkController::class, 'toggleVisibility'])->name('artworks.toggle-visibility');
});



