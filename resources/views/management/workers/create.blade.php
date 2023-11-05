<x-app-layout>
    <x-slot name="header">
        <x-h1>{{ __('Workers') }}</x-h1>
    </x-slot>
    <x-card-form>
        <section class="max-w-xl">
            <header>
                <x-h2>
                    {{ __('Create Worker') }}
                </x-h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('To create a worker, you just need a last name & first name.') }}
                </p>
                {{-- add message if error validation --}}
                @if ($errors->any())
                    <div class="text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-600">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </header>
            <form method="POST" action="{{route("worker.store") }}" enctype="multipart/form-data">
                @csrf
                @include('management.workers.form')
                <div class="flex justify-center m-2">
                    <x-btn-submit>{{ __('Save') }}</x-btn-submit>
                </div>
            </form>
        </section>
    </x-card-form>
</x-app-layout>
