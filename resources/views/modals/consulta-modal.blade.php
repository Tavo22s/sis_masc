<div wire:ignore.self class="modal fade" id="consulta-modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Consulta</h5>
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
                                <label for="motivo-consulta" class="form-control-label">{{ __('Motivo de la consulta') }}</label>
                                <div class="@error('motivo.consulta')border border-danger rounded-3 @enderror">
                                    <input wire:model="motivo" class="form-control" type="text" placeholder="Motivo" name="motivo-consulta">
                                        @error('motivo-consulta')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="motivo-prox-consulta" class="form-control-label">{{ __('Motiva de la proxima consulta') }}</label>
                                <div class="@error('motivo.prox.consulta')border border-danger rounded-3 @enderror">
                                    <input wire:model="motivo_prox" class="form-control" value="" type="text" placeholder="Motivo" name="motivo-prox-consulta">
                                        @error('motivo.prox.consulta')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="consulta-fecha" class="form-control-label">{{__('Fecha de la consulta')}}</label>
                                <div class="@error('consulta.fecha')border border-danger rounded-3 @enderror">
                                    <input wire:model="fecha" type="date" class="form-control" value="" name="consulta-fecha">
                                        @error('consulta.fecha')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="consulta-prox-fecha" class="form-control-label">{{__('Fecha de la proxima consulta')}}</label>
                                <div class="@error('consulta.prox.fecha')border border-danger rounded-3 @enderror">
                                    <input wire:model="fecha_prox" type="date" class="form-control" value="" name="consulta-prox-fecha">
                                        @error('consulta.prox.fecha')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rec" class="form-control-label">{{__('Recomendaciones')}}</label>
                                <textarea wire:model="rec" rows="3" class="form-control" value="" name="rec" placeholder="Recomedaciones"></textarea>              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn bg-gradient-danger" data-bs-dismiss="modal">Cancelar</button>
                @if($id_consulta === 0)
                <button wire:click='Crear()' class="btn bg-gradient-primary">Crear</button>
                @else
                <button class="btn bg-gradient-primary">Guardar</button>
                @endif
            </div>
        </div>
    </div>
</div>