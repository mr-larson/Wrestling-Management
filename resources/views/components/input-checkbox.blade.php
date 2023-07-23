@props(['name', 'value' => null, 'checked' => false, 'disabled' => false])

<input
    type="checkbox"
    name="{{ $name }}"
    value="{{ $value }}"
    {{ $checked ? 'checked' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring focus:ring-blue-200 dark:bg-gray-800 dark:border-gray-600 dark:focus:ring-blue-500']) !!}
/>
