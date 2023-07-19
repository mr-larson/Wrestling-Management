<x-app-layout>
    <x-slot name="header">
        <x-h1>{{ __('Workers') }}</x-h1>
    </x-slot>
    <x-card-form class="bg-blue-">
        <section class="max-w-xl">
            <header>
                <x-h2>
                    {{ __('Show Worker') }}
                </x-h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('To show a worker, list in complete information.') }}
                </p>
            </header>
           
            <div class="max-w-sm mt-6 bg-slate-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-center inline relative">
                    @if ($worker && $worker->promotion && $worker->promotion->image)
                        <img src="/storage/{{ $worker->promotion->image }}" class="h-32 rounded">
                    @else
                        {{ $worker->promotion->name ?? '-' }}
                    @endif
                    <img src="/storage/{{ $worker->image }}" class="h-32 absolute">
                </div>                
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Last Name :{{ $worker->last_name }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">First Name : {{ $worker?->first_name ?? '-' }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Description : {{ $worker?->note ?? '-' }}</p>
                </div>
                <div class="p-5 text-start">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Created by : {{ $worker->user->name }}</p>
                </div>
            </div>
            <div class="bg-red-200 h-100 w-36">

            </div>
        </section>
    </x-card-form>
</x-app-layout>