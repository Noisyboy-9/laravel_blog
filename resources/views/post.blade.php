<x-layout>
    <x-slot name="title"> {{ $post->title }}</x-slot>
    <p>
        <a href="/categories/{{ $post->category->name }}">{{ $post->category->name }}</a>
    </p>

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
</x-layout>


