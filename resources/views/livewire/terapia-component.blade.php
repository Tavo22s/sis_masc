<main class="main-content position-relative mt-1 border-radius-lg ">  
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5 class="mb-0">Terapia</h5>
                    <div class="d-flex flex-row justify-content-between py-2">
                        <div class="col-sm-5">
                        </div>
                        <button class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#terapia-modal" type="button">+&nbsp; Agregar Vacuna</button>
                    </div>
                </div>
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
                                @foreach ( $terapias as $terapia )
                                    <tr>
                                        <td>
                                            <div class="my-auto">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#raza-modal">
                                                    <h6 class="text-center text-xs">{{ $terapia->nombre }}</h6>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="align-center">
                                            <button wire:click="" class="btn btn-link text-secondary mb-0" data-bs-toggle="modal" data-bs-target="#especie-modal">
                                                <i class="fa fa-ellipsis-v text-xs"></i>
                                            </button>
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $terapias->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('modals.terapia-modal')
</main>
