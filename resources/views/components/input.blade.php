@props(['name'])

@php
$classes = $errors->has($name) ? 'is-invalid' : '';
@endphp

<div>
    <input name="{{ $name }}"
        {{ $attributes->merge(['type' => 'text', 'class' => "form-control {$classes}"]) }} />

    @error($name)
        <span class="invalid-feedback"> {{ ucfirst($message) }} </span>
    @enderror
</div>
