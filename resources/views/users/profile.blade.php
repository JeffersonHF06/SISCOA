<x-layout>
    <x-slot name="header">
        <h1>{{ __('Profile: edit personal information') }}</h1>
    </x-slot>

    <div class="container">
        <x-flash-message />

        <x-form method="PUT" action="{{ route('users.profile.update', $user->id) }}">
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="name">{{ __('Full name') }}</label>
                    <x-input name="name" value="{{ old('name') ?? $user->name }}" id="name" />
                </div>

                <div class="form-group col-md">
                    <label for="email">{{ __('Email') }}</label>
                    <x-input name="email" value="{{ old('email') ?? $user->email }}" type="email" id="email" />
                </div>

                <div class="form-group col-md">
                    <label for="phone">{{ __('Phone') }}</label>
                    <x-input name="phone" value="{{ old('phone') ?? $user->phone }}" type="number" id="phone" />
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

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> {{ __('Save') }}
                    </button>
                </div>
            </div>
        </x-form>
    </div>
</x-layout>
