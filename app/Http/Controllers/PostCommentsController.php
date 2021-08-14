<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CommentStoreRequest;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post, CommentStoreRequest $storeRequest)
    {
        $attributes = $storeRequest->validated();

        $post->comments()->create([
            'owner_id' => $storeRequest->user()->id,
            'body' => $attributes['body']
        ]);

        return back()->with('success', 'Comment Added!');
    }
}
