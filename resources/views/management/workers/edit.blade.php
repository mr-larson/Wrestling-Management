<x-app-layout>
    <x-slot name="header">
        <x-h1>{{ __('Workers') }}</x-h1>
    </x-slot>
    <x-card-form>
        <section class="max-w-xl">
            <header>
                <x-h2>
                    {{ __('Update Worker') }}
                </x-h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('To update a worker, you just need a last name & first name.') }}
                </p>
            </header>
            <form method="POST" action="{{route("worker.update", $worker) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('management.workers.form')
                <div class="flex justify-center m-2">
                    <x-btn-submit>{{ __('Save') }}</x-btn-submit>
                </div>
            </form>
        </section>
    </x-card-form>
</x-app-layout>