@props(['icon' => null, 'breakpoint' => 'sm', 'responsive' => false, 'color' => 'info'])

<a {{ $attributes->merge(['class' => 'btn btn-' . $color]) }}>
    @if ($icon)
        <div class="d-flex justify-content-center">
            <div>
                <i class="{{ $icon }} {{ $responsive ? "mr-{$breakpoint}-1" : 'mr-1' }} "></i>
            </div>

            <div class="{{ $responsive ? "d-none d-{$breakpoint}-block" : '' }}">
                {{ $slot }}
            </div>
        </div>
    @else
        {{ $slot }}
    @endif
</a>
