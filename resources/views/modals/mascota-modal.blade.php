<div wire:ignore.self class="modal fade" id="mascota-modal" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ __($nombre) }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{ __($correo) }}
                    </p>
                </div>
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
                            <input wire:model.live="m_busqueda" type="search" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                        <button wire:click.prevent="AddMasc()" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#mascota-info-modal">+&nbsp; Agregar Mascota</button>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                              <tr>
                                  <th class="text-center text-uppercase text-xs font-weight-bolder opacity-7">
                                      Especie
                                  </th>
                                  <th class="text-center text-uppercase text-xs font-weight-bolder opacity-7 ps-2">
                                      Raza
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                      Nombre Mascota
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                      Edad
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                      Sexo
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                      Observaciones
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                      Historia Clinica
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                      Action
                                  </th>
                              </tr>
                            </thead>
                                <tbody>
                                    @foreach ($mascotas as $mascota)
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $mascota->nombre_especie }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $mascota->nombre_raza }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $mascota->nombre }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $mascota->edad }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $mascota->sexo }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $mascota->observaciones }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a wire:click="Rdata({{ $mascota->id }})" class="text-xs font-weight-bold mb-0" href="javascript:void(0);">Ir a Historial Clinica</a>
                                            </td>
                                            <td class="text-center">
                                                <a wire:click.prevent="EditMasc({{ $mascota->id }})" class="mx-3" data-bs-toggle="modal" data-bs-target="#mascota-info-modal" href="javascript:void(0);">
                                                    <i class="fas fa-cog text-secondary"></i>
                                                </a>
                                                <a wire:click="" wire:confirm="¿Esta seguro?" href="javascript:void(0);">
                                                    <span>
                                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>