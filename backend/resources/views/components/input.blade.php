@props(['name', 'label', 'type' => 'text', 'hint' => ''])
<div class="mb-6">
    <label 
        class="block mb-2  uppercase font-bold text-xs text-gray-700" 
        for="{{ $name }}">
        {{ $label }}
    </label>

    <input 
        class="border border-gray-400 p-2 w-full rounded-md"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
        required
    >

    @if($hint !== "")
        <p class="mt-2 text-sm text-gray-400 italic">{{ $hint }}</p>
    @endif

    @error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>

    @enderror
</div>