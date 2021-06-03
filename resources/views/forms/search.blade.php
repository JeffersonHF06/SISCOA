<x-layout>
    <x-slot name="header">
        <h1>{{ __('Forms') }}</h1>
    </x-slot>

    <div class="container">
        <div class="row mb-4">
            <a href="{{ route('forms.index') }}" class="btn btn-link-dark ml-left">
                <i class="fas fa-arrow-left mx-2"></i>
                <i id="button-text">{{ __('Go back') }}</i>
            </a>
        </div>

        @if (!$forms->isEmpty())
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Activity date') }}</th>
                        <th>{{ __('Schedule') }}</th>
                        <th>{{ __('Link') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($forms as $form)
                        @include('forms._form')
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tenemos registros en el sistema.</p>
        @endif

        <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px">
            <div id="copiedToast" class="toast" style="position: absolute; top: 0; right: 0">
                <div class="toast-body">Enlace Copiado</div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const copyLink = (id) => {
                var copyText = document.getElementById(`link${id}`);

                navigator.clipboard.writeText(copyText.value);

                $('#copiedToast').toast('show')
            };

        </script>
    @endpush
</x-layout>
