<?php

use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NavigationController;

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

//Navigation controller. Before login and registration.
Route::get('/', [NavigationController::class, 'start']);
Route::get('/register', [NavigationController::class, 'showRegister']);

//User controller
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout']);

//Post controller
Route::post('/create_post', [PostController::class, 'createPost']);
Route::get('/home', function() {
  if (Auth::check()) {
    $posts = auth()->user()->makePost()->latest()->get();
    //$posts = Post::all();
    return view('home', ['posts' => $posts]);
  }
  return redirect('/');
});
Route::get('/edit/{post}', [PostController::class, 'showEditPost']);
Route::post('/edit/{post}', [PostController::class, 'editPost'])
->name('edit-post');
Route::post('/delete/{post}', [PostController::class, 'deletePost'])
->name('delete-post');

//API for Posts
Route::get('/post/all', [PostController::class, 'showAllPosts'])->middleware('toJson');
Route::get('/post/{post}', [PostController::class, 'showPost']);
Route::get('/userposts/{post}', [PostController::class, 'showUsersPosts']);

