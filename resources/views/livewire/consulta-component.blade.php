<main class="main-content position-relative h-100 mt-1 border-radius-lg ">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <h5 class="mb-0">Historia Clinica</h5>
                </div>
                <hr>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="container">
                        <table class="table table-bordered">
                              <tbody>
                                <tr class="table-dark">
                                    <td colspan="4">
                                    </td>    
                                </tr>
                                <tr>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Nombre:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->nombre }}</span>
                                    </td>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Cliente:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->nombre_completo}}</span>
                                    </td>     
                                </tr>
                                <tr>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Raza:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->nombre_raza }}</span>
                                    </td>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Correo:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->correo }}</span>
                                    </td>     
                                </tr>
                                <tr>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Especie:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->nombre_especie }}</span>
                                    </td>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">DNI:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->dni }}</span>
                                    </td>     
                                </tr>
                                <tr>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Edad:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->edad }}</span>
                                    </td>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Telefono 1:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->telefono_1 }}</span>
                                    </td>     
                                </tr>
                                <tr>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Sexo:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->sexo }}</span>
                                    </td>
                                    <td class="table-dark align-middle text-center">
                                        <span class="text-sm font-weight-bold">Telefono 2:</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-sm font-weight-bold">{{ $datos->telefono_2 }}</span>
                                    </td>     
                                </tr>
                                <tr class="table-dark">
                                    <td colspan="4">
                                    </td>    
                                </tr>
                              </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="card-header pb-0">
                        <h5>Consultas Realizadas</h5>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="col-sm-7">
                            </div>
                            <button wire:click.prevent="ResetC()" class="btn bg-gradient-secondary mb-0" data-bs-toggle="modal" data-bs-target="#consulta-modal" type="button">+&nbsp; Agregar consulta</button>
                        </div>
                    </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="">
                                    <tr>
                                        <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                            Ex.Med.
                                        </th>
                                        <th class="text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Diag.Dif.
                                        </th>
                                        <th class="text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Pl.Diag.
                                        </th>
                                        <th class="text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Pl.Ter.
                                        </th>
                                        <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                            Motivo<br>Consulta
                                        </th>
                                        <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                            Fecha<br>Consulta
                                        </th>
                                        <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                            Recomendaciones
                                        </th>
                                        <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                            Mot.Prox.<br>Consulta
                                        </th>
                                        <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                            Fecha Prox.<br>Consulta
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultas as $consulta)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <a class="mx-auto" data-bs-toggle="modal" data-bs-target="#consulta-modal" href="javascript:void(0);">
                                                        <i class="fas fa-dog"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <a class="mx-auto" data-bs-toggle="modal" data-bs-target="#consulta-modal" href="javascript:void(0);">
                                                        <i class="fas fa-dog"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <a class="mx-auto" data-bs-toggle="modal" data-bs-target="#consulta-modal" href="javascript:void(0);">
                                                        <i class="fas fa-dog"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <a class="mx-auto" data-bs-toggle="modal" data-bs-target="#consulta-modal" href="javascript:void(0);">
                                                        <i class="fas fa-dog"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{ $consulta->motivo_consulta }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-center font-weight-bold mb-0">{{ $consulta->fecha_consulta }}</p>
                                            </td>
                                            <td>
                                                <span class="d-inline-block text-center text-truncate text-xs font-weight-bold" style="max-width: 150px;">{{ $consulta->recomendaciones }}</span> 
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold text-center mb-0">{{ $consulta->motivo_proxima_consulta }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold text-center mb-0">{{ $consulta->fecha_proxima_consulta }}</p>
                                            </td>
                                            <td class="align-middle">
                                                <a wire:click.prevent="Editar({{ $consulta->id }})" class="mx-3" data-bs-toggle="modal" data-bs-target="#consulta-modal" href="javascript:void(0);">
                                                    <i class="fa fa-edit text-secondary"></i>
                                                </a>
                                                <a wire:click.prevent="Destroy({{ $consulta->id }})" href="javascript:void(0);">
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
                    @include('modals.consulta-modal')
                </div>
            </div>
        </div>
    </div>
</main>