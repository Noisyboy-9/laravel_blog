<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


//static pages
Route::get('/', [PagesController::class, 'welcome']);

//posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts/{post}/comments', [PostCommentsController::class, 'store'])->middleware('Auth');

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('/admin/posts', [PostController::class, 'store'])->middleware('admin');

//register
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//login
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'destroy'])->middleware('Auth');

//newsletter
Route::post('newsletter', [NewsLetterController::class, 'store']);


