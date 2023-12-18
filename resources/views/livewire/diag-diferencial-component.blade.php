<div class="card mb-4 mx-4">
        <div class="card-header pb-0">
            <h5>Diagnostico Diferencial</h5>
            <div class="d-flex flex-row justify-content-between">
                <div class="col-sm-7">
                </div>
                <button wire:click.prevent="default()" class="btn bg-gradient-secondary mb-0" data-bs-toggle="modal" data-bs-target="#diag-diferencial" type="button">+&nbsp; Agregar Diagnostico</button>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">
                                Diagnostico
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diag_diferencial as $diag_dif)
                            <tr>
                                <td>
                                    <p class="text-xs text-center font-weight-bold mb-0">{{ $diag_dif->diagnostico->nombre }}</p>
                                </td>
                                <td class="text-center">
                                        <a wire:click.prevent="Editar({{ $diag_dif->id }})" class="mx-3" data-bs-toggle="modal" data-bs-target="#diag-diferencial" href="javascript:void(0);">
                                            <i class="fa fa-edit text-secondary"></i>
                                        </a>
                                        <a wire:click.prevent="Destroy({{ $diag_dif->id }})" href="javascript:void(0);">
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
        @include('modals.diagnostico-diferencial-modal')
</div>
