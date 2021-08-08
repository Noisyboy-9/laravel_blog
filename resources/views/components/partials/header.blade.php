@props(['categories', 'currentCategory'])
<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <!--  Category -->
        <div class="relative flex lg:inline-flex bg-gray-100 rounded-xl">
            <x-partials.dropdown :categories="$categories" :currentCategory="$currentCategory">
                {{-- trigger --}}
                <x-slot name="trigger">
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                        @isset($currentCategory)
                            {{ strtoupper($currentCategory->name) }}
                        @endisset

                        @empty($currentCategory)
                            Category
                        @endempty
                        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                             height="22" viewBox="0 0 22 22">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path fill="#222"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                            </g>
                        </svg>
                    </button>
                </x-slot>

                {{-- links --}}
                <x-partials.dropdown-item href="/posts">All</x-partials.dropdown-item>
                @foreach($categories as $category)
                    <x-partials.dropdown-item href="?category={{ $category->slug }}"
                                              :active="$currentCategory && $currentCategory->is($category)">
                        {{ strtoupper($category->name) }}
                    </x-partials.dropdown-item>
                @endforeach
            </x-partials.dropdown>
        </div>
        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET">
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>

