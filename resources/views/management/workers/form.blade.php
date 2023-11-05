@php use App\Enums\WorkerCategory;use App\Enums\WorkerStatus;use App\Enums\Workerstyle;use App\Enums\WorkerGender; @endphp
<div class="grid grid-cols-3 gap-4 ">
    <div class="mb-6 mt-6">
        <x-input-label for="lastname" :value="__('Last Name*')"/>
        <x-input-text id="lastName" name="lastname" type="text" class="mt-1 block w-full"
                      :value="old('lastname', $worker?->lastname)"/>
    </div>
    <div class="mb-6 mt-6">
        <x-input-label for="firstname" :value="__('First Name*')"/>
        <x-input-text id="firstName" name="firstname" type="text" class="mt-1 block w-full"
                      :value="old('firstname', $worker?->firstname)"/>
    </div>
    <div class="mb-6 mt-6">
        <x-input-label for="nickname" :value="__('Nick Name')"/>
        <x-input-text id="nickname" name="nickname" type="text" class="mt-1 block w-full"
                      :value="old('nickname', $worker?->nickname)"/>
    </div>
    <div class="mb-6">
        <x-label for="gender">Gender</x-label>
        <select name="gender" id="gender" class="block mt-1 w-full rounded-md shadow-sm dark:bg-gray-900 dark:text-white">
            <option value="">Select a gender</option>
            @foreach (WorkerGender::cases() as $gender)
                <option
                    value="{{ $gender->value }}" {{ old('gender', $worker?->gender?->value) === $gender->value ? 'selected' : '' }}>
                    {{ $gender->value }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-6">
        <x-label for="status">Status</x-label>
        <select name="status" id="status" class="block mt-1 w-full rounded-md shadow-sm dark:bg-gray-900 dark:text-white">
            <option value="">Select a status</option>
            @foreach (WorkerStatus::cases() as $status)
                <option
                    value="{{ $status->value }}" {{ old('status', $worker?->status?->value) === $status->value ? 'selected' : '' }}>
                    {{ $status->value }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-6">
        <x-label for="style">Style</x-label>
        <select name="style" id="style" class="block mt-1 w-full rounded-md shadow-sm dark:bg-gray-900 dark:text-white">
            <option value="">Select a style</option>
            @foreach (WorkerStyle::cases() as $style)
                <option
                    value="{{ $style->value }}" {{ old('style', $worker?->style?->value) === $style->value ? 'selected' : '' }}>
                    {{ $style->value }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-6">
        <x-label for="category">Category</x-label>
        <select name="category" id="category" class="block mt-1 w-full rounded-md shadow-sm dark:bg-gray-900 dark:text-white">
            <option value="">Select a category</option>
            @foreach (WorkerCategory::cases() as $category)
                <option
                    value="{{ $category->value }}" {{ old('category', $worker?->category?->value) === $category->value ? 'selected' : '' }}>
                    {{ $category->value }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-6">
        <x-label>Promotion</x-label>
        <x-select name="promotion_id" :options="$promotions" :selected="old('promotion_id', $worker?->promotion_id)"/>
    </div>
    <div class="mb-6">
        <x-label>Image</x-label>
        <x-input id="image" type="file" name="image" :value="old('image')"/>
        @if ($worker?->image)
            <img src="{{ Storage::url($worker?->image) }}" alt="{{ $worker?->last_name }}" class="w-1/2">
        @endif
    </div>
    <div class="mb-6">
        <x-label for="age">Age</x-label>
        <x-input-text id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $worker?->age)"/>
    </div>
    <div class="mb-6">
        <x-label for="height">Height</x-label>
        <x-input-text id="height" name="height" type="number" class="mt-1 block w-full"
                      :value="old('height', $worker?->height)"/>
    </div>
    <div class="mb-6">
        <x-label for="weight">Weight</x-label>
        <x-input-text id="weight" name="weight" type="number" class="mt-1 block w-full"
                      :value="old('weight', $worker?->weight)"/>
    </div>
    <div class="mb-6">
        <x-label for="overall">Overall</x-label>
        <x-input-text id="overall" name="overall" type="number" class="mt-1 block w-full"
                      :value="old('overall', $worker?->overall)"/>
    </div>
    <div class="mb-6">
        <x-label for="popularity">Popularity</x-label>
        <x-input-text id="popularity" name="popularity" type="number" class="mt-1 block w-full"
                      :value="old('popularity', $worker?->popularity)"/>
    </div>
    <div class="mb-6">
        <x-label for="endurance">Endurance</x-label>
        <x-input-text id="endurance" name="endurance" type="number" class="mt-1 block w-full"
                      :value="old('endurance', $worker?->endurance)"/>
    </div>
    <div class="mb-6">
        <x-label for="promo_skill">Promo Skill</x-label>
        <x-input-text id="promo_skill" name="promo_skill" type="number" class="mt-1 block w-full"
                      :value="old('promo_skill', $worker?->promo_skill)"/>
    </div>
    <div class="mb-6 col-span-2">
        <x-label>Note</x-label>
        <x-textarea type="text" name="note">{{ old('note', $worker?->note) }}</x-textarea>
    </div>
    <div class="mb-6">
        <x-input id="user_id" class="block mt-1 w-full" type="hidden" name="user_id"
                 :value="old('user_id', auth()->user()->id)" required autofocus autocomplete="user_id"/>
    </div>
</div>

