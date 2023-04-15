@props(['active', 'fas'])

@php
$classes = ($active ?? false)
            ? 'border-b-2 border-blue-300 dark:border-blue-300 flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700'
            : 'border-b-2 border-transparent flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if ($fas)
        <i class="fas fa-{{ $fas }} text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
    @endif
    <span class="ml-3">{{ $slot }}</span>
</a>

