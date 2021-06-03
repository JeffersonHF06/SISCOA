<x-layout>
    <x-slot name="header">
        <h1>{{ __('Add User') }}</h1>
    </x-slot>

    <div class="container">
        <x-form method="POST" action="{{ route('users.store') }}">
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="name">{{ __('Full name') }}</label>
                    <x-input name="name" value="{{ old('name') }}" id="name" />
                </div>

                <div class="form-group col-md">
                    <label for="email">{{ __('Email') }}</label>
                    <x-input name="email" value="{{ old('email') }}" type="email" id="email" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md">
                    <label for="phone">{{ __('Phone') }}</label>
                    <x-input name="phone" value="{{ old('phone') }}" type="number" id="phone" />
                </div>

                <div class="form-group col-md">
                    <label for="position">{{ __('Position') }}</label>
                    <x-input name="position" value="{{ old('position') }}" id="position" />
                </div>

                <div class="form-group col-md">
                    <label for="role">{{ __('Role') }}</label>
                    <x-select name="role_id" id="role">
                        <option {{ old('role_id') ? '' : 'selected' }} value="" disabled>{{ __('Select') }}
                        </option>

                        @foreach ($roles as $role)
                            <option {{ old('role_id') == $role->id ? 'selected' : '' }} value="{{ $role->id }}">
                                {{ $role->label }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="form row">
                <div class="form-group col-md">
                    <label for="password">{{ __('Password') }}</label>
                    <x-input name="password" type="password" />
                </div>

                <div class="form-group col-md">
                    <label for="password_confirmation">{{ __('Password confirmation') }}</label>
                    <x-input name="password_confirmation" type="password" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col d-flex justify-content-end">
                    <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#cancel-modal">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> {{ __('Save') }}
                    </button>
                </div>
            </div>

            <x-modal id="cancel-modal">
                <x-slot name="title">{{ __('Confirm') }}</x-slot>

                <x-slot name="body">{{ __('Are you sure you want to cancel?') }}</x-slot>

                <x-slot name="success">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-check"></i> {{ __('Yes') }}
                    </a>
                </x-slot>

                <x-slot name="close">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('No') }}
                    </button>
                </x-slot>
            </x-modal>
        </x-form>
    </div>
</x-layout>
