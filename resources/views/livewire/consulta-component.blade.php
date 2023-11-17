@extends('layouts.app')

@section('content')

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
                        <button class="btn bg-gradient-secondary mb-0" data-bs-toggle="modal" data-bs-target="#consulta-modal" type="button">+&nbsp; Agregar Cliente</button>
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
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Mot.Consulta
                                    </th>
                                    <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                        F.Consulta
                                    </th>
                                    <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                        Recomendaciones
                                    </th>
                                    <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                        Mot.Prox.Consulta
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                              <tbody>
                                  
                              </tbody>
                          </table>
                      </div>
                    @include('modals.consulta-modal')
                </div>
            </div>
        </div>
    </div>
@endsection