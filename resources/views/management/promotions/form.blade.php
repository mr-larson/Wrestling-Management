<div>
    <div class="mb-6 mt-6">
        <x-input-label for="name" :value="__('Name')" />
        <x-input-text id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $promotion?->name)" required autofocus autocomplete="name" />
    </div>
    <div class="mb-6">
        <x-label>Image</x-label>
        <x-input id="image" type="file" name="image" :value="old('image')" />
        @if ($promotion?->image)
            <img src="{{ Storage::url($promotion?->image) }}" alt="{{ $promotion?->name }}" class="h-24">
        @endif
    </div>
    <div class="mb-6">
        <x-input-label for="owner" :value="__('Owner')" />
        <x-input-text id="owner" name="owner" type="text" class="mt-1 block w-full" :value="old('owner', $promotion?->owner)" autocomplete="owner" />
    </div>
    <div class="mb-6">
        <x-input-label for="booker" :value="__('Booker')" />
        <x-input-text id="booker" name="booker" type="text" class="mt-1 block w-full" :value="old('booker', $promotion?->booker)" autocomplete="booker" />
    </div>
    <div class="mb-6">
        <x-input-label for="based_in" :value="__('Based In')" />
        <x-input-text id="based_in" name="based_in" type="text" class="mt-1 block w-full" :value="old('based_in', $promotion?->based_in)" autocomplete="based_in" />
    </div>
    <div class="mb-6">
        <x-input-label for="country" :value="__('Country')" />
        <x-input-text id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $promotion?->country)" autocomplete="country" />
    </div>
    <div class="mb-6">
        <x-label for="style">Style</x-label>
        <select name="style" id="style" class="block mt-1 w-full rounded-md shadow-sm">
            <option value="">-</option>
            @foreach (App\Enums\PromotionStyle::cases() as $style)
                <option value="{{ $style->value }}" {{ old('style', $promotion?->style?->value) === $style->value ? 'selected' : '' }}>
                    {{ $style->value }}
                </option>
            @endforeach
        </select>
    </div>      
    <div class="mb-6">
        <x-label>Description</x-label>
        <x-textarea type="text" name="description">{{ old('description', $promotion?->description) }}</x-textarea>
    </div>
    <div class="mb-6">
        <x-input id="user_id" class="block mt-1 w-full" type="hidden" name="user_id" :value="old('user_id', auth()->user()->id)" required autofocus autocomplete="user_id" />
    </div>
</div>

  