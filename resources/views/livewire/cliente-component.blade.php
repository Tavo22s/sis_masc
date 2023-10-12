@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header">
              <h6>LISTA DE CLIENTES</h6>
              <div class="row">
                <div class="col-sm-2">
                  <label class="form-label text-sm" for="buscar">Buscar</label>
                  <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                  </div>
                </div>
                <div class="col-sm-2">
                  <label class="form-label" for="showToastPlacement">&nbsp;</label>
                  <button id="showToastPlacement" class="btn btn-primary d-block active mb-0 text-white" type="button">Agregar Cliente</button>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 gy-3">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Correo</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DNI</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telefono 1</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telefono 2</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($clientes as $c)
                      <tr>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $c->nombre_completo }}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $c->correo }}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $c->dni }}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $c->telefono_1 }}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $c->telefono_2 }}</p>
                        </td>
                        <td class="align-middle">
                          <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
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
  </main>

@endsection