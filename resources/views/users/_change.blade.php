<div class="text-style">
    <div class="modal fade" id="change-password" tabindex="-1" aria-labelledby="change-password-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="change-password-label">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container ">

                        <form action="/users/{{ $user->id }}/change_password" method="POST" id="change-password-form">
                            @csrf

                            <div class="form-group">
                                <label class="control-label  required" for="password-input">Contraseña</label>
                                <input id="password-input" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" placeholder="Contraseña Nueva"></input>

                                @error('password')
                                <div id="error" class="invalid-feedback">{{ ucfirst($message) }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label class="control-label  required" for="confirm-password-input">Confirmar Contraseña</label>
                                <input type="password" id="confirm-password-input" name="password_confirmation" class="form-control {{ $errors->has('confirm-password') ? 'is-invalid' : '' }}" placeholder="Confirmar Contraseña"></input>

                                @error('password_confirmation')
                                <div id="error" class="invalid-feedback">{{ ucfirst($message) }}</div>
                                @enderror

                            </div>

                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-danger mr-2" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar </button>
                                <button type="submit" id="change-btn" class="btn btn-success"><i class="fas fa-save"></i> Guardar </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>