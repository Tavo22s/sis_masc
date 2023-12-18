<div class="card mb-4 mx-4">
        <div class="card-header pb-0">
            <h5>Plan Diagnostico</h5>
            <div class="d-flex flex-row justify-content-between">
                <div class="col-sm-7">
                </div>
                <button wire:click.prevent="default()" class="btn bg-gradient-secondary mb-0" data-bs-toggle="modal" data-bs-target="#plan-terapia" type="button">+&nbsp; Agregar Plan Terapia</button>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                Plan Diagnostico
                            </th>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                Dosis
                            </th>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                Recomendaciones
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($planes_terapia as $plan_terapia)
                            <tr>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $plan_terapia->nombre }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $plan_terapia->dosis }}</p>
                                </td>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $plan_terapia->recomendaciones }}</p>
                                </td>
                                <td class="text-center">
                                        <a wire:click.prevent="Editar({{ $plan_terapia->id }})" class="mx-3" data-bs-toggle="modal" data-bs-target="#plan-terapia" href="javascript:void(0);">
                                            <i class="fa fa-edit text-secondary"></i>
                                        </a>
                                        <a wire:click.prevent="Destroy({{ $plan_terapia->id }})" href="javascript:void(0);">
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
        @include('modals.plan-terapia-modal')
</div>