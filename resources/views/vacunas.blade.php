@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            @livewire('vacuna-component')
        </div>
        <div class="col-6">
            @livewire('terapia-component')
        </div>
    </div>
</div>


@endsection