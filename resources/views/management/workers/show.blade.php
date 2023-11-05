<x-app-layout>
    <x-slot name="header">
        <x-h1>{{ __('Workers') }}</x-h1>
    </x-slot>
    <x-card-form class="">
        <section class="max-w-xl">
            <header>
                <x-h2>
                    {{ __('Show Worker') }}
                </x-h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('To show a worker, list in complete information.') }}
                </p>
            </header>
            <div class="max-w-md mt-6 bg-slate-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="mt-2 flex justify-center inline relative">
                    @if ($worker->promotion && $worker->promotion->image)
                        <img src="/storage/{{ $worker->promotion->image }}" alt="Promotion" class="h-32 w-36 rounded">
                    @elseif ($worker->promotion)
                        <div class="h-32 w-36 rounded bg-gray-200 flex items-center justify-center">
                            {{ $worker->promotion->name }}
                        </div>
                    @else
                        <div class="h-32 w-36 rounded bg-gray-200 flex items-center justify-center">
                            Aucune promotion
                        </div>
                    @endif

                    @if ($worker->image)
                        <img src="/storage/{{ $worker->image }}" alt="Worker" class="h-32 w-36 rounded absolute bottom-0">
                    @else
                        <div class="h-32 w-36 rounded bg-gray-300 flex items-center justify-center absolute bottom-0">
                            don't have image
                        </div>
                    @endif
                </div>

                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Last Name :{{ $worker->lastname }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">First Name : {{ $worker?->firstname ?? '-' }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Gender : {{ $worker?->gender?->value ?? '-' }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Description : {{ $worker?->note ?? '-' }}</p>
                </div>
                <div class="p-5 text-start">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Created by : {{ $worker->user->name }}</p>
                    <a href="{{ route('worker.edit', $worker) }}" class="px-4 py-2 mb-4 text-white bg-gradient-to-r from-blue-400 to-blue-500 rounded hover:bg-blue-700">Edit</a>
                </div>
            </div>
        </section>
    </x-card-form>
</x-app-layout>
