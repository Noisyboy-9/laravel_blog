<x-layout>
    <x-slot name="title">All Posts</x-slot>
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug}}">
                    {{ $post->title }}
                </a>
            </h1>

            <div>
                <p>{{ $post->description }}</p>
            </div>

            <p>
                <a href="/categories/{{ $post->category->name }}">{{ $post->category->name }}</a>
            </p>
        </article>
    @endforeach
</x-layout>
