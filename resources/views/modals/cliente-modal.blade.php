<div class="modal fade" id="cliente-modal" data-bs-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Cliente</h5>
                <button type="button" class="rounded btn-danger" data-bs-dismiss="modal">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                    </span>
                </button>
            </div>

            <hr class="m-0"/>

            <div class="modal-body">
                <div class="card-body pt-4 p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cliente-nombre" class="form-control-label">{{ __('Nombre') }}</label>
                                <div class="@error('cliente.nombre')border border-danger rounded-3 @enderror">
                                    <input wire:model="nombre" class="form-control" value="" type="text" placeholder="Nombre" id="cliente-nombre" name="nombre">
                                        @error('nombre')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Correo') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input wire:model="correo" class="form-control" value="" type="email" placeholder="@example.com" id="cliente-correo" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cliente.dni" class="form-control-label">{{ __('DNI') }}</label>
                                <div class="@error('clinte.dni')border border-danger rounded-3 @enderror">
                                    <input wire:model="dni" class="resize-none form-control" type="tel" placeholder="DNI" id="dni" name="dni" value="">
                                        @error('dni')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cliente.phone1" class="form-control-label">{{ __('Telefono 1') }}</label>
                                <div class="@error('cliente.phone1')border border-danger rounded-3 @enderror">
                                    <input wire:model="telefono1" class="form-control" type="tel" placeholder="40770888444" id="telefono1" name="phone1" value="">
                                        @error('phone1')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cliente.phone2" class="form-control-label">{{ __('Telefono 2') }}</label>
                                <div class="@error('cliente.phone2')border border-danger rounded-3 @enderror">
                                    <input wire:model="telefono2" class="form-control" type="tel" placeholder="40770888444" id="telefono2" name="phone2" value="">
                                        @error('phone2')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn bg-gradient-danger" data-bs-dismiss="modal">Cancelar</button>
                <button wire:click.prevent="Crear()" class="btn bg-gradient-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>