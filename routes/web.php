<?php
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
//    dd('home');
    return view('home');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');

Route::get('/create', [App\Http\Controllers\UsersController::class, 'index'])->name('users');

//Edit artwork request (admin)
Route::get('/posts/store/{id}', [App\Http\Controllers\PostsController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/', [App\Http\Controllers\PostsController::class, 'update'])->name('posts.update');

//Delete artwork (admin)
Route::get('/posts/delete/{id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('posts.delete');


//View users (admin)
Route::get('/view', [App\Http\Controllers\UsersController::class, 'view'])->name('view');


//Create artwork posts (admin)
Route::get('/artwork-upload', [App\Http\Controllers\ArtworkController::class, 'index'])->name('artwork');
Route::post('/artwork-upload', [ App\Http\Controllers\ArtworkController::class, 'store'])->name('artwork.store');

//Post gallery
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts');





