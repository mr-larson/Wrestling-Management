@if (session('success'))
    <div {{ $attributes->merge(['class' =>"flex p-4 mb-4 text-sm text-red-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"]) }} role="alert">
        {{ session('success') }}
    </div>
@endif