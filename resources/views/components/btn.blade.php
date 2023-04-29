<button {{ $attributes->merge(['type' => 'submit', 'class' => 'focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-2.5 p-1 text-center mr-2 mb-2']) }}>
    {{ $slot }}
</button>
