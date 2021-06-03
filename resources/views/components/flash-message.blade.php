@if (session('error'))
    <x-alert type="danger">
        {{ session('error') }}
    </x-alert>
@elseif (session('status'))
    <x-alert type="success">
        {{ session('status') }}
    </x-alert>
@endif
