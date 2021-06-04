@props(['bg' => null])

@php
$classes = $bg ? "bg-{$bg}" : '';
@endphp

<div {{ $attributes->merge(['class' => 'jumbotron ' . $classes]) }}>

    <h1 class="display-12">{{ $header }}</h1>

    <p class="lead">{{ $slot }}</p>

</div>
