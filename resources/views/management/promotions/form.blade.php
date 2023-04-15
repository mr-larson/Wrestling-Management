<form>
    <div class="mb-6">
        <x-label>Name</x-label>
        <x-input type="text" class="" name="name" value="{{ old('name', $promotion?->name) }}"></x-input>
    </div>
</form>
  