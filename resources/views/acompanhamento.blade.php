@extends('layouts.app')

@section('content')

    <style>
           .btn {
                background-color: #17a2b8;
                border: none;
           }
           .btn:hover {
                background-color: #138697;
           }
    </style>

<div class='container'>
    <div class="container rounded bg-white">
    <div class="row justify-content-center" >
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Acompanhamento do Pedido com o ID{{$order->id}}</h4>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12" >
                        <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto; border-radius:10px;margin-top:1rem;padding:0.3rem">
                            <h5 style="padding-top: 0.5rem">Aceite</h5>
                            <form method="GET" action="/viagemaceite2">

                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Nome do Motorista</label><input type="text" class="form-control" name="nome_motorista"
                                    <?php if(isset($servico->viagem_aceite) && $servico->viagem_aceite== 1)
                                                echo "disabled value='$servico->nome_condutor'";
                                                 ?> ></div>
                                <div class="col-md-12"><label class="labels">Marca do Carro</label><input type="text" class="form-control" name="marca_carro" <?php if(isset($servico->viagem_aceite) && $servico->viagem_aceite== 1)
                                    echo "disabled value='$servico->marca_carro'";
                                     ?>  ></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Matricula</label><input type="text" class="form-control" name="matricula" <?php if(isset($servico->viagem_aceite) && $servico->viagem_aceite== 1)
                                    echo "disabled value='$servico->matricula'";
                                     ?> ></div>
                                <div class="col-md-12"><label class="labels">Tempo previsto de chegada</label><input type="time" class="form-control" name="tempo_chegada" <?php if(isset($servico->viagem_aceite) && $servico->viagem_aceite== 1)
                                    echo "disabled value='$servico->tempo_chegada'";
                                     ?> ></div>
                            </div>
                                <input type="text" style=" display: none" value="{{$order->id}}" name="orderId">
                                <input type="submit" class="btn btn-primary" style="margin: 0.6rem;" value=" Seguinte" <?php if(isset($servico->viagem_aceite) && $servico->viagem_aceite== 1)
                                echo "disabled ";
                                 ?>   >
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12" >
                        <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto; border-radius:10px;margin-top:1rem;">
                            <h5 style="padding-top: 0.5rem">Em Andamento</h5>
                            <form method="GET"  action="/emviagem">

                                    <div class="col-md-12"><input type="text" class="form-control" <?php if (isset($servico->id)) echo "value='$servico->id'" ?> name="servico_id"
                                        style=" display: none" ></div>

                                    <input type="text" style=" display: none" value="{{$order->id}}" name="orderId">
                                    <input type="submit" class="btn btn-primary" style="margin: 0.6rem;" value=" Seguinte" <?php if(isset($servico->viagem_anda) && $servico->viagem_anda==1 && $servico->viagem_aceite== 1)
                                    echo "disabled ";
                                     ?>   >
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12" >
                        <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto; border-radius:10px;margin-top:1rem;">
                            <h5 style="padding-top: 0.5rem">Concluido</h5>
                            <form method="GET"  action="/concluida">

                                <div class="col-md-12"><input type="text" class="form-control" <?php if (isset($servico->id)) echo "value='$servico->id'" ?> name="servico_id"
                                    style=" display: none" ></div>

                                <input type="text" style=" display: none" value="{{$order->id}}" name="orderId">
                                <input type="submit" class="btn btn-primary" style="margin: 0.6rem;" value=" Concluido" <?php if(isset($servico->viagem_concluida) && $servico->viagem_concluida ==1 && $servico->viagem_anda==1 && $servico->viagem_aceite== 1)
                                echo "disabled ";
                                 ?>   >
                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
