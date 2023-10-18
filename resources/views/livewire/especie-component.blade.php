<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">  
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 mx-4">
            <div class="card-header pb-0">
                <h6>Especies</h6>
                <div class="d-flex flex-row justify-content-between py-2">
                    <div class="col-sm-7">
                    </div>
                <button class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#especie-modal" type="button">+&nbsp; Agregar Especie</button>
                </div>
            </div>
            @include('modals.especie-modal')
            @include('modals.raza-modal')
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7">Nombre</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $especies as $especie )
                        <tr>
                          <td>
                              <div class="my-auto">
                                <a wire:click.prevent="Editar({{ $especie->id }})" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#raza-modal">
                                  <h6 class="text-center text-sm">{{ $especie->nombre_especie }}</h6>
                                </a>
                              </div>
                          </td>
                          <td class="align-center">
                              <button wire:click="Editar({{ $especie->id }})"class="btn btn-link text-secondary mb-0" data-bs-toggle="modal" data-bs-target="#especie-modal">
                                  <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
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
  </main>