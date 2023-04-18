<x-app-layout>
    <x-slot name="header">
        <x-h2>{{ __('Promotions') }}</x-h2>
    </x-slot>
    <x-success-message></x-success-message>
    <div class="p-4 sm:ml-56 mt-14">
        <div class="flex flex-wrap items-center justify-between p-4">
            <div class="w-full sm:w-auto mb-4 sm:mb-0 sm:mr-4">
                <x-btn-create href="{{ route('promotions.create') }}" :href="route('promotions.create')" :fas="'plus'"> Create </x-btn-create>
            </div>
            <div class="w-full sm:w-auto">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-gray-400 fas fa-search"></i>
                    </div>
                    <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-100 uppercase bg-gradient-to-r from-blue-400 to-blue-500 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <x-sortable-header :value="'name'" :route="'promotions.index'" :orderBy="$orderBy">Name</x-sortable-header>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <x-sortable-header :value="'created_at'" :route="'promotions.index'" :orderBy="$orderBy">Created at</x-sortable-header>
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
                        <td class="px-6 py-4">
                            <img src="{{ asset('public/images/' . $promotion->image) }}" alt="{{ $promotion->name }}">
                        </td>
                        <td class="px-6 py-4">
                            {{ $promotion?->created_at ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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