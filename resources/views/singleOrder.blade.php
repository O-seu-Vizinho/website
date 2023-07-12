@extends('layouts.app')

@section('content')
    <title>O seu Vizinho - Pedido de {{$idoso->idoso_nome}}</title>
    <style>
           .btn {
                background-color: #424242;
                border: none;
           } 
           .btn:hover {
                background-color: #000000;
           }
    </style>
    <div class='container'>
    <div class="container rounded bg-white">
    <div class="row justify-content-center" >
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Pedido {{$order->id}} - Informações Principais</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Tipo</label><input type="text" class="form-control" name="tiposervico" value="{{$service->nome}}" disabled></div>
                    <div class="col-md-6"><label class="labels">Data</label><input type="text" class="form-control" name="datapedido" value="{{$order->data_servico}}" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Local de Partida</label><input type="text" class="form-control" name="localpartida" value="{{$order->local_partida}}" disabled></div>
                    <div class="col-md-6"><label class="labels">Local de Chegada</label><input type="text" class="form-control" name="localchegada" value="{{$order->local_chegada}}" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Hora de Partida</label><input type="text" class="form-control" name="horapartida" value="{{$order->hora_partida}}" disabled></div>
                    <div class="col-md-6"><label class="labels">Hora de Chegada</label><input type="text" class="form-control" name="horachegada" value="{{$order->hora_chegada}}" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Número de Pessoas</label><input type="text" class="form-control" name="npessoas" value="{{$order->n_pessoas}}" disabled></div>
                    <div class="col-md-6"><label class="labels">Necessidades Especiais</label><input type="text" class="form-control" name="necessidades" value="{{$idoso->grau_autonomia}}" disabled></div>                
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Informação Extra</label><input type="text" class="form-control" name="infoextra" value="{{$order->extra_info}}" disabled></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    @if($payment != null)
    <div class='container'>
    <div class="container rounded bg-white">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Informações de Pagamento</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Custo Serviço</label><input type="text" class="form-control" name="custoservico" value="{{$payment->custo_servico}}" disabled></div>
                    <div class="col-md-6"><label class="labels">Custo Comissão</label><input type="text" class="form-control" name="custocomissao" value="{{$payment->custo_comicao}}" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Custo Total</label><input type="text" class="form-control" name="custototal" value="{{$payment->custo_servico}}" disabled></div>
                </div>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Informações de Faturação</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Documentos</label><input type="text" class="form-control" name="documentos" value="Documentos" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Informação Extra</label><input type="text" class="form-control" name="infoextra" value="Extra" disabled></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @else
    <div class='container'>
    <div class="container rounded bg-white">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-5 border-right text-center">
            <div class="p-3 py-5">
                <form method="GET" action="{{url('/createPayment')}}">
                    <input type="text" style=" display: none" value="{{$order->id}}" name="orderId">
                    <input type="submit" class="btn btn-primary" value="Adicionar informações de Pagamento">
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    @endif
    <div class='container'>
        <div class="container rounded bg-white">
            <div class="row mt-4 justify-content-center">
                <div class="col-md-4 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Informações do Operador</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Operador em Linha</label><input type="text" class="form-control" name="operador" value="{{$user->name}}" disabled></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Tempo em Chamada</label><input type="text" class="form-control" name="tempochamada" value="{{$order->tempo_chamada}}" disabled></div>
                            <div class="col-md-6"><label class="labels">Tempo em Espera</label><input type="text" class="form-control" name="tempoespera" value="{{$order->tempo_espera}}" disabled></div>
                        </div>
                    </div>
                </div>
                @if($feedback != null)
                <div class="col-md-4 border-right">
                    <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Feedback do Utilizador</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Nota de Atendimento</label><input type="text" class="form-control" name="notaatendimento" value="{{$feedback->atendimento}}" disabled></div>
                            <div class="col-md-6"><label class="labels">Nota de Serviço</label><input type="text" class="form-control" name="notaservico" value="{{$feedback->serviço}}" disabled></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Feedback Extra</label><input type="text" class="form-control" name="extrafeedback" value="{{$feedback->extra_feedback}}" disabled></div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-5 border-right text-center">
                    <div class="p-3 py-5">
                        <form method="GET" action="{{url('/createFeedback')}}">
                            <input type="text" style=" display: none" value="{{$order->id}}" name="orderId">
                            <input type="submit" class="btn btn-primary" value="Adicionar informações de Feedback">
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!--<@if($feedback != null)
    <div class='container'>
    <div class="container rounded bg-white">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4 border-right">
            <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Informações do Operador</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Operador em Linha</label><input type="text" class="form-control" name="operador" value="Operador em Linha" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Tempo em Chamada</label><input type="text" class="form-control" name="tempochamada" value="Tempo em Chamada" disabled></div>
                    <div class="col-md-6"><label class="labels">Tempo em Espera</label><input type="text" class="form-control" name="tempoespera" value="Tempo em Espera" disabled></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 border-right">
            <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Feedback do Utilizador</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Nota de Atendimento</label><input type="text" class="form-control" name="notaatendimento" value="{{$feedback->atendimento}}" disabled></div>
                    <div class="col-md-6"><label class="labels">Nota de Serviço</label><input type="text" class="form-control" name="notaservico" value="{{$feedback->serviço}}" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Feedback Extra</label><input type="text" class="form-control" name="extrafeedback" value="{{$feedback->extra_feedback}}" disabled></div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class='container'>
    <div class="container rounded bg-white">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-5 border-right text-center">
            <div class="p-3 py-5">
                <form method="GET" action="{{url('/createFeedback')}}">
                    <input type="text" style=" display: none" value="{{$order->id}}" name="orderId">
                    <input type="submit" class="btn btn-primary" value="Adicionar informações de Feedback">
                </form>
            </div>
        </div>
    </div>
    @endif-->
    @endsection