<x-app-layout>
    <x-slot name="header">
        <x-h2>{{ __('Create Promotions') }}</x-h2>
    </x-slot>
    <div class="p-4 sm:ml-64 mt-14">
        <x-errors-message></x-errors-message>
        <form method="POST" action="{{route("promotions.store") }}">
            @csrf
            @include('management.promotions.form')
            <div class="flex justify-center m-2">
                <x-btn-submit type="submit">Submit</x-btn-submit>
            </div>
        </form>
    </div>
</x-app-layout>