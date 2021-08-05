<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::all()->sortBy('created_at')
    ]);
});

Route::get('/posts/{post}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('/categories/{category}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('/users/{user}', function (User $user) {
    return view('user', compact('user'));
});
