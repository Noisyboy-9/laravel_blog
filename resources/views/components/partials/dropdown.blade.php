@props(['categories', 'currentCategory'])
<div x-data="{ show: false }" @click.away="show = false">
    {{--    trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{--    links  --}}
    <div x-show="show" style="display: none"
         class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52">
        {{ $slot }}
    </div>
</div>

