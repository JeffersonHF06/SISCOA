@props(['type' => 'info'])

@php
$icons = [
    'info' => 'fas fa-info',
    'success' => 'fas fa-check',
    'danger' => 'fas fa-exclamation-circle',
    'warning' => 'fas fa-exclamation-triangle',
];
@endphp

<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    <i class="{{ $icons[$type] }} mr-1"></i>
    {{ $slot }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
