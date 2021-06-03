@props(['id', 'size' => 'md'])

@if (isset($trigger))
    <span data-toggle="modal" data-target="#{{ $id }}">
        {{ $trigger }}
    </span>
@endif

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-{{ $size }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {{ $body }}
            </div>

            <div class="modal-footer">
                {{ $success }}

                <span data-dismiss="modal">
                    @if (isset($close))
                        {{ $close }}
                    @else
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Close') }}</button>
                    @endif
                </span>
            </div>
        </div>
    </div>
</div>
