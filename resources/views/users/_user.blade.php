<tr>
    <td>
        {{ $user->name }}
    </td>

    <td>
        {{ $user->email }}
    </td>

    <td>
        {{ $user->phone }}
    </td>

    <td>
        {{ $user->position }}
    </td>

    <td>
        {{ $user->role->label }}
    </td>

    <td>
        <div class="row">
            <x-a icon="fas fa-marker" class="m-1" color="secondary" href="{{ route('users.edit', $user->id) }}">
                {{ __('Edit') }}
            </x-a>

            <x-button icon="far fa-trash-alt" color="danger" type="button" class="m-1" data-toggle="modal"
                data-target="#delete-user-{{ $user->id }}-modal">
                {{ __('Delete') }}
            </x-button>

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
