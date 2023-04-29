<x-app-layout>
    <x-slot name="header">
        <x-h2>{{ __('Workers') }}</x-h2>
    </x-slot>

    <div class="p-4 sm:ml-56 mt-14">
        <div class="flex flex-wrap items-center justify-between p-4">
            <div class="w-full sm:w-auto mb-4 sm:mb-0 sm:mr-4">
                <x-btn-create :href="route('worker.create')" :fas="'plus'"> Create </x-btn-create>
            </div>
            <div class="w-full sm:w-auto mb-4 sm:mb-0 sm:mr-4 items-center">
                <x-success-message></x-success-message>
            </div>
            <x-search :action="route('worker.search')" name="search" :home="route('worker.index')"></x-search>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs text-gray-100 uppercase bg-gradient-to-r from-blue-400 to-blue-500 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <x-sortable-header :value="'last_name'" :route="'worker.index'" :orderBy="$orderBy">Last name
                        </x-sortable-header>
                        <x-sortable-header :value="'first_name'" :route="'worker.index'" :orderBy="$orderBy">First name
                        </x-sortable-header>
                        <th scope="col" class="px-6 py-3">Image</th>
                        <th scope="col" class="px-6 py-3">Promotion</th>
                        <x-sortable-header :value="'created_at'" :route="'worker.index'" :orderBy="$orderBy">Created at
                        </x-sortable-header>
                        <th scope="col">
                            <span class="sr-only"></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($workers as $worker)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $worker?->last_name }}
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $worker?->first_name }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="/storage/{{ $worker->image }}">
                            </td>
                            <td class="px-6 py-4">
                                {{ $worker?->promotion?->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $worker?->created_at->format('d/m/Y') ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-btn-group>
                                    <x-btn-show :action="route('worker.show', ['worker' => $worker])"></x-btn-show>
                                    <x-btn-edit :action="route('worker.edit', ['worker' => $worker])"></x-btn-edit>
                                    <x-btn-destroy :action="route('worker.destroy', ['worker' => $worker])"></x-btn-destroy>
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
