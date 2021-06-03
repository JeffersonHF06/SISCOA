@props(['name'])

@php
$classes = $errors->has($name) ? 'is-invalid' : '';
@endphp

<div>
    <select name="{{ $name }}" {{ $attributes->merge(['class' => "form-control {$classes}"]) }}>
        {{ $slot }}
    </select>

    @error($name)
        <span class="invalid-feedback"> {{ ucfirst($message) }} </span>
    @enderror
</div>
