<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Promotions') }}
        </h2>
    </x-slot>
    
    <div class="p-4 sm:ml-64 mt-14">
        <div class="flex items-center justify-between pb-4">
            <div>
                <a href="{{ route('promotions.create') }}" class="text-white bg-gradient-to-r from-blue-400 to-blue-500 border-blue-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    <i class="fas fa-plus text-white"></i>
                    <span class="ml-2">Create</span>
                </a>
            </div>
            <div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-100 uppercase bg-gradient-to-r from-blue-400 to-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <x-sortable-header :value="'name'" :route="'promotions.index'" :orderBy="$orderBy">Name</x-sortable-header>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <x-sortable-header :value="'created_at'" :route="'promotions.index'" :orderBy="$orderBy">Created at</x-sortable-header>
                        <th scope="col">
                            <span class="sr-only"></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        @forelse ($promotions as $promotion)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $promotion?->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $promotion?->description ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $promotion?->created_at ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        @empty
                            <td colspan="4" class="px-6 py-4 text-center"> No yet</p>
                        @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>