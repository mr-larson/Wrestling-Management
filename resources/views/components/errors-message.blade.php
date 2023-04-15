@if ($errors->isNotEmpty())
    <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800">
        <ul class="m-0">
        @foreach ($errors->all() as $message)
            <li class="font-medium">{{ $message }}</li>
        @endforeach
        </ul>
    </div>
@endif