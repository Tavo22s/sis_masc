<div wire:ignore.self class="modal fade" id="mascota-info-modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Mascota</h5>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mas-especie" class="form-control-label">{{ __('Especie') }}</label>
                                <select wire:model.live="mas_esp" class="form-select" name="especie" id="especie">
                                    @foreach ($especies as $especie)
                                        <option value="{{ $especie->id }}">{{ $especie->nombre_especie }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mas-raza" class="form-control-label">{{ __('Raza') }}</label>
                                <select wire:model.live="mas_raz" class="form-select" name="raza" id="raza">
                                    @foreach ($razas as $raza)
                                    <option value="{{ $raza->id }}" 
                                        @if( $raza->id === $mas_raz)
                                            selected="selected"
                                        @endif
                                        >{{ $raza->nombre_raza }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mascota-nombre" class="form-control-label">{{ __('Nombre de mascota') }}</label>
                                <div class="@error('mas_nom')border border-danger rounded-3 @enderror">
                                    <input wire:model="mas_nom" class="form-control" value="" type="text" placeholder="Nombre" name="mas_nom">
                                        @error('mas_nom')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mascota_edad" class="form-control-label">{{ __('Edad') }}</label>
                                <div class="@error('mas_edad')border border-danger rounded-3 @enderror">
                                    <input wire:model="mas_edad" class="form-control" type="tel" placeholder="Edad" name="mas_edad">
                                        @error('mas_edad')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mas-s" class="form-control-label">{{ __('Sexo') }}</label>
                                <select wire:model.live="mas_s" class="form-select" name="sexo" id="sexo">
                                    <option value="Macho">Macho</option>
                                    <option value="Hembra">Hembra</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mascota_observacion" class="form-control-label">{{ __('Observaciones') }}</label>
                                <div class="@error('mas_obs')border border-danger rounded-3 @enderror">
                                    <textarea wire:model="mas_obs" class="form-control" rows="3" placeholder="Observaciones" required></textarea>
                                        @error('mas_obs')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn bg-gradient-danger" data-bs-dismiss="modal">Cancelar</button>
                @if($mas_id_sel === 0)
                    <button wire:click.prevent="CreateMasc()" class="btn bg-gradient-primary">Crear</button>
                @else
                    <button wire:click.prevent="UpdateMasc()" class="btn bg-gradient-primary">Guardar</button>
                @endif
            </div>
        </div>
    </div>
</div>