<div wire:ignore.self class="modal fade" id="diagnostico-modal" data-bs-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dianostico</h5>
                <button wire:click="default()" type="button" class="rounded btn-danger" data-bs-dismiss="modal">
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
                                <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                    <input wire:model="nombre" class="form-control" value="" type="text" placeholder="Nombre" id="cliente-nombre" name="nombre">
                                        @error('nombre')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="default()" class="btn bg-gradient-danger" data-bs-dismiss="modal">Cancelar</button>
                @if($id_seleccionado === 0)
                    <button wire:click.prevent="Crear()" class="btn bg-gradient-primary">Crear</button>
                @else
                    <button wire:click.prevent="Update()" class="btn bg-gradient-primary">Guardar</button>
                @endif
            </div>
        </div>
    </div>
</div>