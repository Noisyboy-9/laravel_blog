<x-layout>
    <x-slot name="title">LOGIN</x-slot>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl border border-gray-200">
            <h1 class="text-center font-bold text-xl mb-10 ">Login</h1>
            <form action="/login" method="POST">
                @csrf
                <x-form.input field="email" type="text"/>
                <x-form.input field="password" type="password"/>
                <x-form.submit>Login</x-form.submit>
            </form>
        </main>
    </section>
</x-layout>
