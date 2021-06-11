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
        {{ $user->career->name }}
    </td>

    <td>
        {{ $user->position->name }}
    </td>

    <td>
        {{ $user->role->label }}
    </td>

    <td>
        <div class="row">
            @can('update', $user)
                <x-a icon="fas fa-marker" class="m-1" color="secondary" href="{{ route('users.edit', $user->id) }}">
                    {{ __('Edit') }}
                </x-a>
            @endcan

            @can('update', $user)
                <x-form method="PUT" action="{{ route('users.activate', $user->id) }}">
                    <x-button type="submit" icon="fas {{ $user->is_active == 1 ? 'fa-check' : 'fa-exclamation-circle' }}"
                        color="{{ $user->is_active == 1 ? 'success' : 'danger' }}" class="m-1">
                        {{ $user->is_active == 1 ? __('Active') : __('Inactive') }}
                    </x-button>
                </x-form>
            @endcan

            @can('delete', $user)
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
            @endcan
        </div>
    </td>
</tr>
