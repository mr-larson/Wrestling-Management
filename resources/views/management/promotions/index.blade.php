<x-app-layout>
    <x-slot name="header">
        <x-h2>{{ __('Promotions') }}</x-h2>
    </x-slot>
    
    <div class="p-4 sm:ml-56 mt-14">
        <div class="flex flex-wrap items-center justify-between p-4">
            <div class="w-full sm:w-auto mb-4 sm:mb-0 sm:mr-4">
                <x-btn-create :href="route('promotion.create')" :fas="'plus'"> Create </x-btn-create>
            </div>
            <div class="w-full sm:w-auto mb-4 sm:mb-0 sm:mr-4 items-center">
                <x-success-message></x-success-message>
            </div>
            <x-search :action="route('promotion.search')" name="search" :home="route('promotion.index')"></x-search>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-100 uppercase bg-gradient-to-r from-blue-400 to-blue-500 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <x-sortable-header :value="'name'" :route="'promotion.index'" :orderBy="$orderBy">Name</x-sortable-header>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <x-sortable-header :value="'created_at'" :route="'promotion.index'" :orderBy="$orderBy">Created at</x-sortable-header>
                        <th>Total Workers</th>
                        <th scope="col">
                            <span class="sr-only"></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($promotions as $promotion) 
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $promotion?->name }}
                        </th>
                        <x-td><img src="/storage/{{ $promotion?->image }}" class="h-16 rounded"></x-td>
                        <td class="px-6 py-4">
                            {{ $promotion?->created_at->format('d/m/Y') ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $promotion->workers->count() }}
                        </td>
                        <td class="px-6 py-4 text-right">   
                            <x-btn-group>
                                <x-btn-show :action="route('promotion.show', ['promotion' => $promotion])"></x-btn-show>
                                <x-btn-edit :action="route('promotion.edit', ['promotion' => $promotion])"></x-btn-edit>
                                <x-btn-destroy :action="route('promotion.destroy', ['promotion' => $promotion])"></x-btn-destroy>
                            </x-btn-group>
                        </td>
                    </tr>
                    @empty
                        <td colspan="4" class="px-6 py-4 text-center"> No yet</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>