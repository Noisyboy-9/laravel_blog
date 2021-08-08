<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(): Factory|View|Response|bool|Application
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request()->only('search', 'category'))->get(),
        ]);
    }

    public function show(Post $post): Factory|View|Response|bool|Application
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
