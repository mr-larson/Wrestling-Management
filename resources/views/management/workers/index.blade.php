<x-app-layout>
    <x-slot name="header">
        <x-h2>{{ __('Workers') }}</x-h2>
    </x-slot>
    <div class="p-4 md:ml-56 mt-14">
        <div class="flex flex-wrap items-center justify-between p-4">
            <x-btn-create :href="route('worker.create')" :fas="'plus'"> Create </x-btn-create>
            <x-success-message></x-success-message>       
            <x-search :action="route('worker.search')" name="search" :home="route('worker.index')"></x-search>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table>
                <x-thead>
                    <tr class="shadow">
                        <x-sortable-header :value="'last_name'" :route="'worker.index'" :orderBy="$orderBy">Last name
                        </x-sortable-header>
                        <x-sortable-header :value="'first_name'" :route="'worker.index'" :orderBy="$orderBy">First name
                        </x-sortable-header>
                        <x-th>Image</x-th>
                        <x-sortable-header :value="'promotion_id'" :route="'worker.index'" :orderBy="$orderBy">Promotion
                        </x-sortable-header>
                        <x-sortable-header :value="'score'" :route="'worker.index'" :orderBy="$orderBy">Score
                        </x-sortable-header>
                        <x-th class="text-center">Actions</x-th>
                        <x-th class="text-center"><span class="sr-only"></span></x-th>
                        <x-th><span class="sr-only"></span></x-th>
                    </tr>
                </x-thead>
                <tbody>
                    @forelse ($workers as $worker)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <x-td>
                                <a href="{{ route('worker.show', ['worker' => $worker]) }}">
                                    {{ $worker?->last_name }}
                                </a>
                            </x-td>
                            <x-td>
                                <a href="{{ route('worker.show', ['worker' => $worker]) }}">
                                    {{ $worker?->first_name }}
                                </a>
                            </x-td>
                            <x-td>
                                @if ($worker->image == null)
                                    <span> </span>
                                @else
                                    <img class="h-10 w-10 rounded-full" src="/storage/{{ $worker->image }}" alt="">
                                @endif
                            </x-td>
                            <x-td>
                                @if ($worker?->promotion?->image)
                                    <a href="{{ route('promotion.show', ['promotion' => $worker?->promotion]) }}">
                                        <img src="/storage/{{ $worker?->promotion?->image }}" class="h-12 w-16 rounded">
                                    </a>
                                @else
                                    <span>{{ $worker?->promotion?->name ?? 'Free Agent' }}</span>
                                @endif
                            </x-td>
                            <x-td>{{ $worker->wins }} - {{ $worker->draws }} - {{ $worker->losses }}</x-td>
                            <x-td>
                                <form action="{{ route('worker.updateScore', ['worker' => $worker]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex justify-around">
                                        <x-btn type="submit" name="result" value="win" class="text-emerald-700 bg-emerald-100 hover:bg-emerald-300 focus:ring-emerald-300 border border-emerald-700">+</x-btn>
                                        <x-btn type="submit" name="result" value="draw" class="text-yellow-700 bg-yellow-100 hover:bg-yellow-300 focus:ring-yellow-300 border border-yellow-700">=</x-btn>
                                        <x-btn type="submit" name="result" value="loss" class="text-red-700 bg-red-100 hover:bg-red-300 focus:ring-red-300 border border-red-700">-</x-btn>
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
        <x-paginate>{{ $workers->links() }}</x-paginate>
    </div>
</x-app-layout>
