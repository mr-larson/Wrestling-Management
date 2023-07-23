<x-app-layout>
    <x-slot name="header">
        <x-h1>{{ __('Tournament') }}</x-h1>
    </x-slot>
    <x-card-form class="bg-blue-">
        <section class="max-w-xl">
            <header>
                <x-h2>
                    {{ __('Create Tournament') }}
                </x-h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Fill in the information to create a new tournament.') }}
                </p>
            </header>
            <form method="POST" action="{{ route('tournament.store') }}">
                @csrf
                <div class="mb-6">
                    <x-label for="name" :value="__('Name*')" />
                    <x-input-text id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" />
                </div>
                <div class="mb-6">
                    <x-label for="num_participants" :value="__('Number of Participants*')" />
                    <x-input-number id="num_participants" name="num_participants" class="mt-1 block w-full" :value="old('num_participants')" />
                </div>
                <div class="mb-6">
                    <x-label for="has_group_phase" :value="__('Has Group Phase*')" />
                    <x-input-checkbox id="has_group_phase" name="has_group_phase" :checked="old('has_group_phase', false)" />
                </div>
                <div class="mb-6">
                    <x-label>Promotion (Leave blank for all promotions)</x-label>
                    <x-select name="promotion_id[]" :options="$promotions" :selected="old('promotion_id', [])" multiple />
                </div>
                <div class="flex justify-center m-2">
                    <x-btn-submit>{{ __('Create Tournament') }}</x-btn-submit>
                </div>
            </form>
        </section>
    </x-card-form>
</x-app-layout>
