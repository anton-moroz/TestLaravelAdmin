@props([
    'name',
    'text',
    'checked' => false,
    'disabled' => false

])

<div class="mt-4 flex items-center">
    <label class="font-medium text-sm text-gray-700" for="{{ $name }}">{{ __( $text ) }}</label>

    <input
        id="{{ $name }}" class="ml-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        type="checkbox"
        name="{{ $name }}"
        {{ $checked === 'on' ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
    />
</div>
