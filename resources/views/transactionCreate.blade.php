@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="card bg-white" style="width: 30rem;">
        <form action="{{route('createTransacao')}}" method="POST">
            @csrf
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Adicionar Transação</h4>
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-md-6"><label class="labels">Valor da Transação</label><input type="number" class="form-control" name="valor" placeholder="número" required></div>
                    </div>
                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-6 text-center"><button class="btn btn-primary" style="border: none; background-color: #17a2b8">Adicionar Transação</button></div>
                    </div>
                </div>
            </div>
            <input type="number" value={{$userId}} name="userId" hidden>
        </form>
    </div>
</div>

@endsection