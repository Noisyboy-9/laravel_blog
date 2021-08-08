<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
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

//posts
Route::get('/', [PagesController::class, 'welcome']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

//categories
Route::get('/categories/{category}', [PostCategoryController::class, 'show']);

//users  
Route::get('/users/{user}', [UserController::class, 'show']);
