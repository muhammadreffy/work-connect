@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'description' => null,
    'value' => null,
])

<label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">
    {{ $label }}
</label>
<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
    id="{{ $id }}" type="file" name="{{ $name }}" value="{{ $value }}">
<p class="mt-1 text-xs text-gray-500">
    {{ $description }}
</p>

<p class="mt-2 text-xs text-red-600">
    @error($name)
        {{ $message }}
    @enderror
</p>
