<div>
    <div class="mb-6 mt-6">
        <x-input-label for="last_name" :value="__('Last Name*')" />
        <x-input-text id="lastName" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $worker?->last_name)" />
    </div>
    <div class="mb-6">
        <x-input-label for="first_name" :value="__('First Name*')" />
        <x-input-text id="firstName" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $worker?->first_name)" />
    </div>
    <div class="mb-6">
        <x-label>Image</x-label>
        <x-input id="image" type="file" name="image" :value="old('image')" />
        @if ($worker?->image)
            <img src="{{ Storage::url($worker?->image) }}" alt="{{ $worker?->last_name }}" class="w-1/2">
        @endif
    </div>
    <div class="mb-6">
        <x-label>Promotion</x-label>
        <x-select name="promotion_id" :options="$promotions" :selected="old('promotion_id', $worker?->promotion_id)" />
    </div>
    <div class="mb-6">
        <x-label>Note</x-label>
        <x-textarea type="text" name="note">{{ old('description', $worker?->note) }}</x-textarea>
    </div>
    <div class="mb-6">
        <x-input id="user_id" class="block mt-1 w-full" type="hidden" name="user_id" :value="old('user_id', auth()->user()->id)" required autofocus autocomplete="user_id" />
    </div>
</div>

  