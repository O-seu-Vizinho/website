@extends('layouts.app')

@section('content')
<title>O seu Vizinho - Verificar pedido</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

<div class="row justify-content-center">
    <div class="card bg-white" style="width: 30rem;">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Informações de Jornada</h4>
                </div>
                <div class="row mt-3 justify-content-center">
                    @if ($journey)
                    <div class="col-md-12 border-right">
                        <label class="labels">Viagem Aceite:</label>
                        @if ($journey->viagem_aceite == 0)
                        <td><b>X</b></td>
                        @else
                        <td><i class="fa fa-check"></i></td>
                        @endif
                    </div>
                    <div class="col-md-12 border-right">
                        <label class="labels">Em Viagem:</label>
                        @if ($journey->viagem_anda == 0)
                        <td><b>X</b></td>
                        @else
                        <td><i class="fa fa-check"></i></td>
                        @endif
                    </div>
                    <div class="col-md-12 border-right">
                        <label class="labels">Viagem Concluída:</label>
                        @if ($journey->viagem_concluida == 0)
                        <td><b>X</b></td>
                        @else
                        <td><i class="fa fa-check"></i></td>
                        @endif
                    </div>
                    <div class="col-md-12 border-right">
                        <div class="col-md-6"><label class="labels">Marca do Carro</label><input type="text" class="form-control" name="nome" value="{{$journey->marca_carro}}" disabled></div>
                    </div>
                    <div class="col-md-12 border-right">
                        <div class="col-md-6"><label class="labels">Nome do Condutor</label><input type="text" class="form-control" name="nome" value="{{$journey->nome_condutor}}" disabled></div>
                    </div>
                    <div class="col-md-12 border-right">
                        <div class="col-md-6"><label class="labels">Matrícula</label><input type="text" class="form-control" name="nome" value="{{$journey->matricula}}" disabled></div>
                    </div>
                    <div class="col-md-12 border-right">
                        <div class="col-md-6"><label class="labels">Tempo de Chegada</label><input type="text" class="form-control" name="nome" value="{{$journey->tempo_chegada}}" disabled></div>
                    </div>
                    @else
                    <div class="col-md-12 border-right">
                        <label class="labels">A processar pedido</label>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection