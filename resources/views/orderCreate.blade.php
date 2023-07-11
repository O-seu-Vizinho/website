@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container rounded bg-white mt-5 mb-5">
            <form class="row" action="{{route('createPedido')}}" method="POST">
                @csrf
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Adicionar Pedido</h4>
                        </div>
        
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Serviço</label>
                                <select name="servico" id="servico" class="form-control" onchange="enableIdosos();" required>
                                    <option value="" disabled selected>Selecione um serviço</option>
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6"><label class="labels">Idoso</label>
                            <select name="idoso" id="idoso" class="form-control" required>
                                <option value="" disabled selected>Selecione um idoso</option>
                                @foreach($idosos as $idoso)
                                    <option value="{{$idoso->id}}">{{$idoso->nome}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Data do Serviço</label><input type="date" class="form-control" name="dataserv" required></div>
                            <div class="col-md-6"><label class="labels">local de Partida</label><input type="text" class="form-control" name="partida" placeholder="Insira o local de partida" required ></div>
                            <div class="col-md-6"><label class="labels">Local de Chegada</label><input type="text" class="form-control" name="chegada" placeholder="Insira o local de chegada"  required></div>
                            <div class="col-md-6"><label class="labels">Hora da Partida</label><input type="time" class="form-control" name="hpartida" required></div>
                            <div class="col-md-6"><label class="labels">Hora da Chegada</label><input type="time" class="form-control" name="hchegada" required></div>
                        </div>
        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 py-5 d-flex flex-column" style="height: 100%;">
                        <br><br>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">N.º Pessoas</label>
                                <input type="number" class="form-control" name="npessoas" placeholder="Quantas pessoas?" required>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="recorrente" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Serviço recorrente?
                                    </label>
                                </div>
                            </div>
                        </div>
                         <br>
                        <div class="mt-2">
                            <div class="col-md-12">
                                <label class="labels">Informação extra</label>
                                <textarea class="form-control" name="extrainfo" placeholder="Escreva aqui detalhes do pedido" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6"><label class="labels">Tempo de Chamada</label><input type="time" class="form-control" name="tchamada" required></div>
                            <div class="col-md-6"><label class="labels">Tempo de Espera</label><input type="time" class="form-control" name="tespera" required></div>
                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Criar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection