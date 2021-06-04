<tr>
    <td id="table-body-text">
        {{ $user->name }}
    </td>

    <td id="table-body-text">
        {{ $user->email }}
    </td>

    <td id="table-body-text">
        {{ $user->phone }}
    </td>

    <td id="table-body-text">
        {{ $user->career->name }}
    </td>

    <td id="table-body-text">
        {{ $user->position->name }}
    </td>

    <td id="table-body-text">
        {{ $user->role->label }}
    </td>

    <td id="table-body-elements">
        <div class="row">
            <a class="btn btn-secondary mr-2 mb-2" href="{{ route('users.edit', $user->id) }} ">
                <i class="fas fa-marker"></i>
                {{ __('Edit') }}
            </a>

            <x-form method="PUT" action="{{ route('users.activate', $user->id) }}">
                <button type="submit" class="btn {{ $user->is_active == 1 ? 'btn-success' : 'btn-danger' }} mr-2 mb-2"><i class="fas {{ $user->is_active == 1 ? 'fa-check' : 'fa-exclamation-circle' }}"> </i>{{ $user->is_active == 1 ? ' Activo' : ' Inactivo' }}</button>
            </x-form>

            <button type="button" class="btn btn-danger mr-2 mb-2" data-toggle="modal"
                data-target="#delete-user-{{ $user->id }}-modal">
                <i class="far fa-trash-alt"></i> {{ __('Delete') }}
            </button>

            <x-modal id="delete-user-{{ $user->id }}-modal">
                <x-slot name="title">{{ __('Confirm') }}</x-slot>

                <x-slot name="body">
                    {{ __('Are you sure you want to delete the user :user?', ['user' => $user->name]) }}
                </x-slot>

                <x-slot name="success">
                    <x-form method="DELETE" action="{{ route('users.destroy', $user->id) }}">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-check"></i> {{ __('Yes') }}
                        </button>
                    </x-form>
                </x-slot>

                <x-slot name="close">
                    <button type="button" class="btn btn-secondary">
                        <i class="fas fa-times"></i> {{ __('No') }}
                    </button>
                </x-slot>
            </x-modal>
        </div>
    </td>
</tr>
