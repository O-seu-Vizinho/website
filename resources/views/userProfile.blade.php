@extends('layouts.app')

@section('content')

<title>{{$user->name}}</title>
<div class="container rounded bg-white">
    <div class="row" >

        <div class="col-md-3">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://cdn-icons-png.flaticon.com/512/44/44948.png?w=740&t=st=1689034969~exp=1689035569~hmac=b39fc13daea746d6dd6cc4a87e748b76059710336859dbdcc0bb9ad79e81a494"><span> </span></div>
            <div class="row mt-3">
                <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:200px; border-radius:10px;margin-top:1rem; margin-left: 4rem">
                    <h4 style="padding-top: 0.5rem">Saldo</h4>
                    <h3 style="padding-bottom: 0.5rem"><b>{{$user->salldo}}€</b></h3>
                </div>
            </div>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Perfil de Utilizador</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nome</label><input type="text" class="form-control" name="nome" value="{{$user->name}}" disabled></div>
                    <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" name="pronome" value="{{$user->email}}" disabled ></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Numero de telemóvel</label><input type="text" class="form-control" name="n_telemovel" value="{{$user->n_telemovel}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Data de Nascimento</label><input type="text" class="form-control" name="data_nascimento" value="{{$user->data_nascimento}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Morada</label><input type="text" class="form-control" name="morada" value="{{$user->morada}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Código Postal</label><input type="text" class="form-control" name="codigo_postal" value="{{$user->codigo_postal}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Concelho</label><input type="text" class="form-control" name="concelho" value="{{$user->concelho}}" disabled></div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5 d-flex flex-column" style="height: 100%;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-right">Histórico de Transações</h5>
                </div>
                <div class="row mt-2">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Id Transação</th>
                                <th>Valor</th>
                                <th>Data</th>
                                <th>
                                    <form method="GET" action="/createTransaction">
                                        <input type="number" value={{$user->id}} name="userId" hidden>
                                        @if (Auth::user()->role_id == 1)
                                        <input type="submit" value="+" style="color:#FFF;background-color:#17a2b8; border:none; border-radius:30%">
                                        @endif
                                    </form>
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($transacoes as $transacao)
                                <tr>
                                <td>{{$transacao->id}}</td>
                                <td>{{$transacao->valor}}</td>
                                <td>{{$transacao->created_at}}</td>
                                <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection