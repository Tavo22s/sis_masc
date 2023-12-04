<div wire:ignore.self class="modal fade" id="examen-modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Examen Medico</h5>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="peso" class="form-control-label">{{ __('Peso') }}</label>
                                <div class="@error('peso')border border-danger rounded-3 @enderror">
                                    <input wire:model="peso" class="form-control" type="number" placeholder="Peso">
                                        @error('peso')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="motivo-prox-consulta" class="form-control-label">{{ __('Frecuencia Cardiaca') }}</label>
                                <div class="@error('frec_cardiaca')border border-danger rounded-3 @enderror">
                                    <input wire:model="frec_cardiaca" class="form-control" type="number" placeholder="Frecuencia Cardiaca">
                                        @error('frec_cardiaca')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tllc" class="form-control-label">{{__('TLLC')}}</label>
                                <div class="@error('tllc')border border-danger rounded-3 @enderror">
                                    <input wire:model="tllc" type="number" class="form-control" placeholder="Tllc">
                                        @error('tllc')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="temperatura" class="form-control-label">{{ __('Temperatura') }}</label>
                                <div class="@error('temperatura')border border-danger rounded-3 @enderror">
                                    <input wire:model="temperatura" class="form-control" type="text" placeholder="Temperatura">
                                        @error('temperatura')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="frec_respiratoria" class="form-control-label">{{__('Frecuencia Respiratoria')}}</label>
                                <div class="@error('frec_respiratoria')border border-danger rounded-3 @enderror">
                                    <input wire:model="frec_respiratoria" type="number" class="form-control" placeholder="Frecuencia Respiratoria">
                                        @error('frec_respiratoria')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mucosa" class="form-control-label">{{__('Mucosas')}}</label>
                                <div class="@error('mucosa')border border-danger rounded-3 @enderror">
                                    <input wire:model="mucosa" type="text" class="form-control" placeholder="Mucosa">
                                        @error('mucosa')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="obs" class="form-control-label">{{__('Recomendaciones')}}</label>
                                <div class="@error('obs')border border-danger rounded-3 @enderror">
                                    <textarea wire:model="obs" rows="3" class="form-control" placeholder="Observaciones"></textarea>
                                    @error('obs')
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