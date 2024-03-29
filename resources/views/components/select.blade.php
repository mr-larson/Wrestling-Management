@props(['options', 'name', 'selected' => null])

<select name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'block w-full bg-gray-50 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
    <option value="">-- Select --</option>
    @foreach ($options as $option)
        <option value="{{ $option->id }}" {{ $option->id == $selected ? 'selected' : '' }}>{{ $option->name }}</option>
    @endforeach
</select>
