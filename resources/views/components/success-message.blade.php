@if (session('success'))
    <div {{ $attributes->merge(['class' =>"flex center px-4 py-2 mb-4 text-sm text-green-600 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"]) }} role="alert">
        {{ session('success') }}
    </div>
@endif