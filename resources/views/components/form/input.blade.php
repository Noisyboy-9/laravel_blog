@props(['field', 'type' => 'text'])

<div class="mb-6">
    <x-form.label :field="$field"/>
    <input class="border border-gray-400 p-2 w-full"
           value="{{ old($field) }}"
           name="{{ $field }}"
           id="{{ $field }}"
           type="{{ $type }}"
           required>
    <x-form.error :field="$field"/>
</div>
