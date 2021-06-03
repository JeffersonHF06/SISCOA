<x-layout>
    <x-slot name="header">
        <h1>Lista de asistencia de {{ $form->title }}</h1>
    </x-slot>

    <div class="container">
        <x-flash-message />

        <list :form="{{ $form }}" />
    </div>

    @push('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @endpush
</x-layout>
