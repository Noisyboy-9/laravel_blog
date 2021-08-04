<x-layout>
    <x-slot name="title"> {{ $post->title }}</x-slot>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p>
        <a href="#">{{ $post->category->name }}</a>
    </p>
</x-layout>


