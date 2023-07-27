<x-app-layout>
    <x-slot name="header">
        <x-h1>{{ __('Promotions') }}</x-h1>
    </x-slot>
    <x-card-form class="">
        <header>
            <x-h2>
                {{ __('Show Promotion') }}
            </x-h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('To show a promotion, list in complete information.') }}
            </p>
        </header>
        <section class="grid grid-rows-3 grid-flow-col gap-12 mt-6">
            <div class="row-span-2 max-w-sm bg-slate-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img src="/storage/{{ $promotion?->image }}" class="rounded-t-lg">
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $promotion->name }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Description : {{ $promotion?->description ?? '-' }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Created by : {{ $promotion->user->name }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Created at : {{ $promotion?->created_at->format('d/m/Y') ?? '-' }}</p>    
                </div>
                <div class="p-5 text-start">
                    <a href="{{ route('promotion.edit', $promotion) }}" class="px-4 py-2 mb-4 text-white bg-gradient-to-r from-blue-400 to-blue-500 rounded hover:bg-blue-700">Edit</a>
                </div>
            </div>

            <div class="row-span-3 col-span-6 bg-slate-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="font-normal text-gray-700 dark:text-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <x-table>
                            <x-thead>
                                <tr>
                                    <x-th>Rank</x-th>
                                    <x-th>Worker</x-th>
                                    <x-th>Score</x-th>
                                    <x-th colspan="2">Actions</x-th>
                                </tr>
                            </x-thead>
                            <tbody>
                                @forelse ($rankedWorkers as $worker)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <x-td>{{ $loop->iteration }}</x-td>
                                        <x-td>
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                                <a href="{{ route('worker.show', $worker) }}" class="flex items-center space-x-3">
                                                    @if ($worker->image == null)
                                                        <span>{{ $worker?->first_name }} {{ $worker?->last_name }}</span>
                                                    @else
                                                        <img class="w-8 h-8 rounded-full" src="/storage/{{ $worker->image }}" alt="">
                                                        <span>{{ $worker?->first_name }} {{ $worker?->last_name }}</span>
                                                    @endif
                                                </a>
                                            </div>
                                        </x-td>
                                        <x-td>{{ $worker->wins }} - {{ $worker->draws }} - {{ $worker->losses }}</x-td>
                                        <x-td>
                                            <form action="{{ route('worker.updateScore', ['worker' => $worker]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="flex justify-around">
                                                    <x-btn type="submit" name="result" value="win" class="text-emerald-700 bg-emerald-100 hover:bg-emerald-300 focus:ring-emerald-300 border border-emerald-700 mx-1">+</x-btn>
                                                    <x-btn type="submit" name="result" value="draw" class="text-yellow-700 bg-yellow-100 hover:bg-yellow-300 focus:ring-yellow-300 border border-yellow-700 mx-1">=</x-btn>
                                                    <x-btn type="submit" name="result" value="loss" class="text-red-700 bg-red-100 hover:bg-red-300 focus:ring-red-300 border border-red-700 mx-1">-</x-btn>
                                                </div>
                                            </form>                                          
                                        </x-td>    
                                        <x-td>
                                            <form action="{{ route('worker.resetScore', ['worker' => $worker]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <x-btn type="submit" name="result" value="reset" class="hover:bg-slate-200 dark:hover:bg-slate-700 focus:ring-slate-300 border border-slate-300">Reset</x-btn>
                                            </form>
                                        </x-td>                  
                                    </tr>
                                @empty
                                    <td colspan="7" class="px-3 py-4 text-center"> No yet</p>
                                @endforelse
                            </tbody>                
                        </x-table>
                    </div>
                </div>
            </div>
        </section>
    </x-card-form>
</x-app-layout>