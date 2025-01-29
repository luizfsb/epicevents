@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm texto-label']) }}>
    {{ $value ?? $slot }}
</label>
