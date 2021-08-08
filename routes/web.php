<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
    $posts = Post::latest();

    if (request('search')) {
        $posts->where('title', 'like', "%" . request('search') . "%")
            ->orWhere('description', 'like', "%" . request('search') . "%")
            ->orWhere('body', 'like', "%" . request('search') . '%');
    }

    $posts = $posts->get();
    $categories = Category::all();

    return view('posts', compact('posts', 'categories'));
});

Route::get('/posts/{post}', function (Post $post) {
    return view('post', [
        'post' => $post,
    ]);
});

Route::get('/categories/{category}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('/users/{user}', function (User $user) {
    $user->load('posts');
    return view('user', compact('user'));
});
