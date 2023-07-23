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
                                    <x-th>Actions</x-th>
                                    <x-th><span class="sr-only"></span></x-th>
                                </tr>
                            </x-thead>
                            <tbody>
                                @forelse ($rankedWorkers as $worker)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <x-td>{{ $loop->iteration }}</x-td>
                                        <x-td>
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                                {{ $worker?->first_name }} {{ $worker?->last_name }}
                                            </div>
                                            {{-- <a href="{{ route('#', $worker) }}" class="flex items-center space-x-3">
                                            </a> --}}
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
                                                    <form action="{{ route('worker.resetScore', ['worker' => $worker]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <x-btn type="submit" name="result" value="reset" class="hover:bg-slate-200 dark:hover:bg-slate-700 focus:ring-slate-300 border border-slate-300">Reset</x-btn>
                                                    </form>
                                                </div>
                                            </form>
                                        </x-td>                    
                                        <x-td class="text-right">
                                            <x-btn-group>
                                                <x-btn-show :action="route('worker.show', ['worker' => $worker])"></x-btn-show>
                                                <x-btn-edit :action="route('worker.edit', ['worker' => $worker])"></x-btn-edit>
                                                <x-btn-destroy :action="route('worker.destroy', ['worker' => $worker])"></x-btn-destroy>
                                            </x-btn-group>
                                        </x-td>
                                    </tr>
                                @empty
                                    <td colspan="7" class="px-3 py-4 text-center"> No yet</p>
                                @endforelse
                            </tbody>                
                        </x-table>
                </div>
            </div>
        </section>
    </x-card-form>
</x-app-layout>