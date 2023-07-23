<x-app-layout>
    <x-slot name="header">
        <x-h2>{{ __('Tournaments') }}</x-h1>
    </x-slot>
    <div class="p-4 md:ml-56 mt-14">
        <div class="flex flex-wrap items-center justify-between p-4">
            <x-btn-create :href="route('tournament.create')" :fas="'plus'"> Create </x-btn-create>
            <x-success-message></x-success-message>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <x-table>
                <x-thead>
                    <tr class="shadow">
                        <x-th>Name</x-th>
                        <x-th>Number of Participants</x-th>
                        <x-th>Has Group Phase</x-th>
                        <x-th>Promotion</x-th>
                        <x-th>Actions</x-th>
                    </tr>
                </x-thead>
                <tbody>
                    @forelse ($tournaments as $tournament)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <x-td>{{ $tournament->name }}</x-td>
                            <x-td>{{ $tournament->num_participants }}</x-td>
                            <x-td>{{ $tournament->has_group_phase ? 'Yes' : 'No' }}</x-td>
                            <x-td>{{ $tournament->promotion->name ?? '-' }}</x-td>
                            <x-td>   
                                <x-btn-group>
                                    <x-btn-show :action="route('tournament.show', ['tournament' => $tournament])"></x-btn-show>
                                    <x-btn-edit :action="route('tournament.edit', ['tournament' => $tournament])"></x-btn-edit>
                                    <x-btn-destroy :action="route('tournament.destroy', ['tournament' => $tournament])"></x-btn-destroy>
                                </x-btn-group>
                            </x-td>
                        </tr>
                    @empty
                        <td colspan="6" class="px-3 py-4 text-center">No tournaments yet</td>
                    @endforelse
                </tbody>
            </x-table>
        </div>
        <x-paginate>{{ $tournaments->links() }}</x-paginate>
    </div>
</x-app-layout>
