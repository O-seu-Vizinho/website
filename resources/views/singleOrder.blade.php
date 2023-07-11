@extends('layouts.app')

@section('content')
    <title>O seu Vizinho - Pedido de {{$idoso->idoso_nome}}</title>
    <style>
            
    </style>
    <div class='container'>
        serviço: {{$service->nome}}
    </div>
    @endsection