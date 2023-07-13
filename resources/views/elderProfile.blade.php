@extends('layouts.app')

@section('content')
<title>{{$idoso->nome}}</title>
<div class="container rounded bg-white">
    <div class="row" >

        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://cdn-icons-png.flaticon.com/512/44/44948.png?w=740&t=st=1689034969~exp=1689035569~hmac=b39fc13daea746d6dd6cc4a87e748b76059710336859dbdcc0bb9ad79e81a494"><span> </span></div>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Idoso - ID{{$idoso->id}}</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Nome</label><input type="text" class="form-control" name="nome" value="{{$idoso->nome}}" disabled></div>
                    <div class="col-md-6"><label class="labels">SobreNome</label><input type="text" class="form-control" name="pronome" value="{{$idoso->pronome}}" disabled ></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Numero de telemóvel</label><input type="text" class="form-control" name="n_telemovel" value="{{$idoso->n_telemovel}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Data de Nascimento</label><input type="text" class="form-control" name="data_nascimento" value="{{$idoso->data_nascimento}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Morada</label><input type="text" class="form-control" name="morada" value="{{$idoso->data_nascimento}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Código Postal</label><input type="text" class="form-control" name="codigo_postal" value="{{$idoso->codigo_postal}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Concelho</label><input type="text" class="form-control" name="concelho" value="{{$idoso->concelho}}" disabled></div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5 d-flex flex-column" style="height: 100%;">
                <br><br>
                <div class="col-md-12">
                    <label class="labels">Grau de Autonomia</label>
                    <input type="text" class="form-control" name="grau_autonomia" value="{{$idoso->grau_autonomia}}" disabled>
                </div> <br>
                <div class="col-md-12">
                    <label class="labels">Descrição</label>
                    <textarea class="form-control" name="descricao" placeholder="{{$idoso->descricao}}" disabled></textarea>
                </div>
                <div class="col-md-12">
                    <label class="labels">Outras Informações</label>
                    <textarea class="form-control" name="outras_infos" placeholder="{{$idoso->outras_infos}}" disabled></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
