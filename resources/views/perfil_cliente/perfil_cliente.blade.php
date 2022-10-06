@extends('layouts/plantilla_landing')

    
@section('content')
    <h1>Cliente</h1>
    <h1>Nombre Usuario: {{Auth::user()->name}}</h1>
    <h1>Nombre Usuario: {{Auth::user()->email}}</h1>
@endsection