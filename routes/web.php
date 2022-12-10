<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoryController;

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
Route::get('/', function () {return view('/home');});

//routes


Auth::routes();

Route::get('/home', [App\Http\Controllers\ArtworkController::class, 'index'])->name('home');

Route::post('/artwork/search', [App\Http\Controllers\CategoryController::class, 'search'])->name('artworks.search');

Route::resource('/categories', CategoryController::class)->names('categories');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');

#Create artwork request (users)
Route::get('/create', [App\Http\Controllers\ArtworkController::class, 'create'])->name('artworks.create');
Route::post('/store', [App\Http\Controllers\ArtworkController::class, 'store'])->name('artworks.store');

//Edit artwork request (admin)
Route::get('/artworks/store/{id}', [App\Http\Controllers\ArtworkController::class, 'edit'])->name('artworks.edit');
Route::put('/artworks/update/{artwork}', [App\Http\Controllers\ArtworkController::class, 'update'])->name('artworks.update');
Route::get('/artworks/edit/{artwork}', [App\Http\Controllers\ArtworkController::class, 'edit'])->name('artworks.edit');

//Delete artwork (admin)
Route::get('/artworks/destroy/{id}', [App\Http\Controllers\ArtworkController::class, 'destroy'])->name('artworks.destroy');

// View Artworks
Route::get('/artworks/view/{artwork}', [App\Http\Controllers\ArtworkController::class, 'view'])->name('artworks.view');










