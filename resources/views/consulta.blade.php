@extends('layouts.user_type.auth')

@section('content')

@livewire('consulta-component', ['id' => $id])

@endsection