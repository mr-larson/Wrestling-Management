@props(['action', 'label' => null])
<form class="inline" action="{{ $action }}" method="POST" onsubmit="return confirm('Are you sure?')">
    @method('DELETE')
    @csrf
    <button type="submit" {{ $attributes->merge(['class' => 'px-4 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-blue-500 dark:focus:text-white']) }}>
        @if (null !== $label) {{ $label }}@else
        <i class="fas fa-trash-alt"></i>
        @endif
    </button>
</form>