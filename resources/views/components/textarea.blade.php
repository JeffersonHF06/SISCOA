@props(['name'])

@php
$classes = $errors->has($name) ? 'is-invalid' : '';
@endphp

<div>
    <textarea name="{{ $name }}"
        {{ $attributes->merge(['class' => "form-control {$classes}"]) }}>{{ $slot }}</textarea>

    @error($name)
        <span class="invalid-feedback"> {{ ucfirst($message) }} </span>
    @enderror
</div>
