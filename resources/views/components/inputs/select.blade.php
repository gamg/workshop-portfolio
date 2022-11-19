@props([
    'placeholder' => null,
])
<div class="flex">
    <select {{ $attributes->merge(['class' => 'block mt-1 w-full pl-3 py-2 mb-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}>
        @if ($placeholder)
            <option value="" disabled>{{ $placeholder }}</option>
        @endif
        {{ $slot }}
    </select>
</div>



