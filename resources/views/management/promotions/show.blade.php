<x-app-layout>
    <x-slot name="header">
        <x-h1>{{ __('Promotions') }}</x-h1>
    </x-slot>
    <x-card-form class="bg-blue-">
        <section class="max-w-xl">
            <header>
                <x-h2>
                    {{ __('Show Promotion') }}
                </x-h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('To show a promotion, you just need a name.') }}
                </p>
            </header>
           {{-- show promotion --}}
           
        </section>
    </x-card-form>
</x-app-layout>