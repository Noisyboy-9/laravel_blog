<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex - items-center">

        @guest()
            <a href="/login" class="text-xs font-bold uppercase mr-3">Login</a>

            <a href="/register"
               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Register
            </a>
        @endguest

        @auth
            <a href="/posts" class="text-xs font-bold uppercase mr-5">Posts</a>


            <form action="/logout" method="post" class="text-sm font-bold uppercase mr-3">
                @csrf
                <button type="submit" class="font-semibold">logout</button>
            </form>

            <a href="/users/{{ auth()->user()->username }}"
               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                {{ auth()->user()->name }}
            </a>
        @endauth
    </div>
</nav>

