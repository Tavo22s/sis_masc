<div wire:ignore.self class="modal fade" id="raza-modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $nombre }}</h5>
                <button wire:click="default()" type="button" class="rounded btn-danger" data-bs-dismiss="modal">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><style>svg{fill:#ffffff}</style><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                    </span>
                </button>
            </div>

            <hr class="m-0"/>

            <div class="modal-body">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between py-2">
                        <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input id="busqueda" wire:model.live="busqueda" type="search" class="form-control" placeholder="Buscar...">
                            </div>
                        </div>
                        <button wire:click.prevent="OpenAdd()" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Agregar Raza</button>
                    </div>
              </div>
                <div class="card-body pt-4 p-3">
                    <div class="row">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 65%" class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Nombre
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($add_r)
                                        <tr>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <div class="col-sm-7">
                                                        <input wire:model="r_name" type="search" class="form-control text-center" placeholder="Raza">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button wire:click.prevent="save_r()" type="button" class="btn bg-gradient-dark">Guardar</button>
                                                <button wire:click.prevent="CloseAdd" type="button" class="btn bg-gradient-danger">Cancelar</button>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach ($razas as $raza)
                                        <tr>
                                            <td class="text-center">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="">
                                                    <p class="text-md font-weight-bold mb-0">$raza->nombre_raza</p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                            </td>
                                        </tr>    
                                    @endforeach
                                    <tr>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="">
                                                <p class="text-md font-weight-bold mb-0">Boxer</p>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>