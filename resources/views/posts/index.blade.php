<x-layout>
    <x-slot name="title">All Posts</x-slot>
    <x-partials.header/>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-partials.post-grid :posts="$posts"/>
        @else
            <p class="text-center">No posts. Please comeback later.</p>
        @endif

        {{ $posts->links() }}
    </main>
</x-layout>
