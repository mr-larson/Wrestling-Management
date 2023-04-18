<div>
    <div class="mb-6 mt-6">
        <x-input-label for="name" :value="__('Name')" />
        <x-input-text id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $promotion?->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div class="mb-6">
        <x-label>Image</x-label>
        <x-input id="image" class="block mt-1 mb-4 w-full" type="file" name="image" :value="old('image')" />
        @if ($promotion?->image)
            <img src="{{ Storage::url($promotion?->image) }}" alt="{{ $promotion?->name }}" class="w-1/2">
        @endif
    </div>
    <div class="mb-6">
        <x-label>Description</x-label>
        <x-textarea type="text" name="description">{{ old('description', $promotion?->description) }}</x-textarea>
    </div>
</div>

  