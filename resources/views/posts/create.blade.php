<x-layout>
    <x-slot name="title">CREATE POST</x-slot>
    <h1 class="text-3xl text-center font-bold mt-10">Publish New Post</h1>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 p-6 rounded-xl border border-gray-200">
            <form action="/admin/posts" method="post" enctype="multipart/form-data">
                @csrf
                {{--title--}}
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                    <input class="border border-gray-400 p-2 w-full"
                           value="{{ old('title') }}"
                           type="text"
                           name="title"
                           id="title"
                           required>
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--slug--}}
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                    <input class="border border-gray-400 p-2 w-full"
                           value="{{ old('slug') }}"
                           type="text"
                           name="slug"
                           id="slug"
                           required>
                    @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="thumbnail"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                    <input class="border border-gray-400 p-2 w-full"
                           value="{{ old('thumbnail') }}"
                           type="file"
                           name="thumbnail"
                           id="thumbnail"
                           required>
                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--description--}}
                <div class="mb-6">
                    <label for="description"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">Description</label>
                    <textarea class="border border-gray-400 p-2 w-full"
                              name="description"
                              id="description"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--body--}}
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                    <textarea class="border border-gray-400 p-2 w-full"
                              name="body"
                              id="body"
                              required>{{ old('body') }}</textarea>
                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--category_id--}}
                <div class="mb-6">
                    <label for="category_slug"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                    <select name="category_id">
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_slug') === $category->slug ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{--submit button --}}
                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 rounded-xl hover:bg-blue-500" type="submit">
                        Publish
                    </button>
                </div>
            </form>
        </main>
    </section>

</x-layout>
