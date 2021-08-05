<x-layout>
    <x-slot name="title"> {{ $post->title }}</x-slot>

    <h1>{{ $post->title }}</h1>

    <p>{{ $post->body }}</p>

    <p>
        By <a href="/users/{{ $post->owner->username }}">{{ $post->owner->name }}</a> in
        <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        category
    </p>
</x-layout>


