@extends('layouts.user_type.auth')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            @livewire('diagnostico-component')
        </div>
        <div class="col-6">
            @livewire('plan-component')
        </div>
    </div>
</div>

@endsection