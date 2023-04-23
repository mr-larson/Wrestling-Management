<div {{ $attributes->merge(['class' => "p-4 sm:ml-64 mt-14"]) }}>
    <div {{ $attributes->merge(['class' => "max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"]) }}>
        <div {{ $attributes->merge(['class' => "p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg", 'style' => "background-image: url(...)"]) }}>
            {{ $slot }}
        </div>
    </div>
</div>