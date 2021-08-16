<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use function request;

class PostController extends Controller
{
    private array $filters = ['search', 'category', 'owner'];

    public function index(): Factory|View|Response|bool|Application
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request()->only(...$this->filters))
                ->simplePaginate(5)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post): Factory|View|Response|bool|Application
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create(): Factory|View|Response|bool|Application
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(PostStoreRequest $storeRequest): Redirector|Application|RedirectResponse
    {
        $attributes = $storeRequest->validated();
        $attributes['thumbnail_path'] = $storeRequest->file('thumbnail')->storePublicly('thumbnails');
        
        $post = auth()->user()->posts()->create($attributes);

        return redirect("/posts/{$post->slug}")->with('success', 'Post has been created successfully!');
    }
}
