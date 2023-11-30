<main class="main-content position-relative h-100 mt-1 border-radius-lg ">
  <div class="row">
      <div class="col-12">
          <div class="card mb-4 mx-4">
              <div class="card-header pb-0">
                  <div class="d-flex flex-row justify-content-between">
                      <div>
                          <h5 class="mb-0">Lista de Clientes</h5>
                      </div>
                  </div>
                    <div class="d-flex flex-row justify-content-between py-2">
                        <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input id="busqueda" wire:model.live="busqueda" type="search" class="form-control" placeholder="Buscar...">
                            </div>
                        </div>
                        <button class="btn bg-gradient-secondary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#cliente-modal" type="button">+&nbsp; Agregar Cliente</button>
                    </div>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="container">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead class="table-dark">
                              <tr>
                                  <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                      Nombre
                                  </th>
                                  <th class="text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                      Correo
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                      DNI
                                  </th>
                                  <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                      Telefono 1
                                  </th>
                                  <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                      Telefono 2
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td class="text-center">
                                            <a wire:click="Editar({{ $cliente->id }})" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#mascota-modal">
                                                <p class="text-xs font-weight-bold mb-0">{{ $cliente->nombre_completo }}</p>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $cliente->correo }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $cliente->dni }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $cliente->telefono_1 }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $cliente->telefono_2 }}</p>
                                        </td>
                                        <td class="text-center">
                                            <a wire:click.prevent="Editar({{ $cliente->id }})" class="mx-3" data-bs-toggle="modal" data-bs-target="#cliente-modal" href="javascript:void(0);">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <a wire:click="Destroy({{ $cliente->id }})" wire:confirm="¿Esta seguro?" href="javascript:void(0);">
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
    @include('modals.cliente-modal')
    @include('modals.mascota-modal')
    @include('modals.mascota-info-modal')
  </div>
</main>

