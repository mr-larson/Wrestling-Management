@props(['action', 'active' => false])
<a href="{{ $action }}"{{ $attributes->merge(['class' => 'px-4 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-teal-100 hover:text-teal-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-teal-600 dark:focus:ring-blue-500 dark:focus:text-white'. ($active ? 'active' : '')]) }}>
    <i class="fas fa-eye"></i>
    <span class=""> {{ $slot }} </span>
</a>
