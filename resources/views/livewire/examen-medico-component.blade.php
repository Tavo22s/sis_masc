<div class="card mb-4 mx-4">
    @if($id_consulta !== 0)
        <div class="card-header pb-0">
            <h5>Examen Medico</h5>
            <div class="d-flex flex-row justify-content-between">
                <div class="col-sm-7">
                </div>
                <button wire:click.prevent="" class="btn bg-gradient-secondary mb-0" data-bs-toggle="modal" data-bs-target="#examen-modal" type="button">+&nbsp; Agregar Examen</button>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                Peso
                            </th>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Temperatura
                            </th>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Frecuencia cardiaca
                            </th>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                Frecuencia respiratoria
                            </th>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                TLLC
                            </th>
                            <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                Mucosa
                            </th>
                            <th class="text-center text-secondary text-secondary text-xs font-weight-bolder opacity-7">
                                Observaciones
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ex_medicos as $ex_medico)
                            <tr>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $ex_medico->peso }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $ex_medico->temperatura }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $ex_medico->frecuencia_cardiaca }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $ex_medico->frecuencia_respiratoria }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $ex_medico->tllc }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $ex_medico->mucosa }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $ex_medico->observaciones }}</p>
                                </td>
                                <td class="align-middle">
                                    <a wire:click.prevent="Editar({{ $ex_medico->id }})" class="mx-3" data-bs-toggle="modal" data-bs-target="#consulta-modal" href="javascript:void(0);">
                                        <i class="fa fa-edit text-secondary"></i>
                                    </a>
                                    <a wire:click.prevent="Destroy({{ $ex_medico->id }})" href="javascript:void(0);">
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
        @include('modals.examen-medico-modal')
    @endif
</div>
