<x-layout>
    <x-slot name="title">PROFILE</x-slot>

    <h1> {{ $user->name }}</h1>
    <h2>all posts</h2>

    @foreach($user->posts as $post)
        <article>
            <h2>
                <a href="/posts/{{ $post->slug}}">
                    {{ $post->title }}
                </a>
            </h2>

            <div>
                <p>{{ $post->description }}</p>
            </div>

            <p>
                Category: <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>
        </article>
    @endforeach
</x-layout>
