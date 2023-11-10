@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">  
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <h5 class="mb-0">Historia Clinica</h5>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="container mt-4">
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
                </div>
            </div>
        </div>
    </div>
</main>
@endsection