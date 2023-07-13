@extends('layouts.app')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <form class="row" action="{{route('createIdoso')}}" method="POST">
        @csrf
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://cdn-icons-png.flaticon.com/512/44/44948.png?w=740&t=st=1689034969~exp=1689035569~hmac=b39fc13daea746d6dd6cc4a87e748b76059710336859dbdcc0bb9ad79e81a494"><span> </span></div>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Adicionar Idoso</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nome</label><input type="text" class="form-control" name="nome" placeholder="Primeiro Nome" required></div>
                    <div class="col-md-6"><label class="labels">SobreNome</label><input type="text" class="form-control" name="pronome" placeholder="SobreNome" required></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Numero de telemóvel</label><input type="text" class="form-control" name="n_telemovel" placeholder="Insira o número de Telemóvel" required></div>
                    <div class="col-md-12"><label class="labels">Data de Nascimento</label><input type="date" class="form-control" name="data_nascimento" required ></div>
                    <div class="col-md-12"><label class="labels">Morada</label><input type="text" class="form-control" name="morada" placeholder="Insira a sua morada"  required></div>
                    <div class="col-md-12"><label class="labels">Código Postal</label><input type="text" class="form-control" name="codigo_postal" placeholder="Ex: 1600-175" required></div>
                    <div class="col-md-12"><label class="labels">Concelho</label><input type="text" class="form-control" name="concelho" placeholder="Insira o seu concelho" required></div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5 d-flex flex-column" style="height: 100%;">
                <br><br>
                <div class="col-md-12">
                    <label class="labels">Grau de Autonomia</label>
                    <input type="text" class="form-control" name="grau_autonomia" placeholder="Qual o grau de autonomia?" required>
                </div> <br>
                <div class="col-md-12">
                    <label class="labels">Descrição</label>
                    <textarea class="form-control" name="descricao" placeholder="Descricao" required></textarea>
                </div>
                <div class="col-md-12">
                    <label class="labels">Outras Informações</label>
                    <textarea class="form-control" name="outras_infos" placeholder="Descreve outras informações " required></textarea>
                </div>
                <input type="number" value="{{$userId}}" hidden name="userId">
                <div class="mt-auto text-center">
                    <button class="btn btn-primary profile-button" type="submit" style="background-color: #17a2b8; border: none">Criar</button>

                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>

@endsection
