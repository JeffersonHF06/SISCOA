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
                    <x-select name="position_id" id="position">
                        <option {{ old('position_id') ? '' : 'selected' }} value="" disabled>
                            {{ __('Select') }}
                        </option>

                        @foreach ($positions as $position)
                            <option {{ old('position_id') == $position->id ? 'selected' : '' }}
                                value="{{ $position->id }}">
                                {{ $position->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="form-row">


                <div class="form-group col-md">
                    <label for="career">{{ __('Career') }}</label>
                    <x-select name="career_id" id="career">
                        <option {{ old('career_id') ? '' : 'selected' }} value="" disabled>
                            {{ __('Select') }}
                        </option>

                        @foreach ($careers as $career)
                            <option {{ old('career_id') == $career->id ? 'selected' : '' }}
                                value="{{ $career->id }}">
                                {{ $career->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>

                <div class="form-group col-md">
                    <label for="role">{{ __('Role') }}</label>
                    <x-select name="role_id" id="role">
                        <option {{ old('role_id') ? '' : 'selected' }} value="" disabled>
                            {{ __('Select') }}
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
                    <x-button icon="fas fa-times" color="danger" type="button" class="mr-2" data-toggle="modal"
                        data-target="#cancel-modal">
                        {{ __('Cancel') }}
                    </x-button>

                    <x-button icon="fas fa-save" color="success" type="submit">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </div>

            <x-modal id="cancel-modal">
                <x-slot name="title">{{ __('Confirm') }}</x-slot>

                <x-slot name="body">{{ __('Are you sure you want to cancel?') }}</x-slot>

                <x-slot name="success">
                    <x-a icon="fas fa-check" color="secondary" href="{{ route('users.index') }}">
                        {{ __('Yes') }}
                    </x-a>
                </x-slot>

                <x-slot name="close">
                    <x-button icon="fas fa-times" color="danger" type="button">
                        {{ __('No') }}
                    </x-button>
                </x-slot>
            </x-modal>
        </x-form>
    </div>
</x-layout>
