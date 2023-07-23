@props(['name', 'value' => null, 'min' => null, 'max' => null, 'step' => '1', 'disabled' => false])

<input
    type="number"
    name="{{ $name }}"
    value="{{ $value }}"
    min="{{ $min }}"
    max="{{ $max }}"
    step="{{ $step }}"
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
/>
