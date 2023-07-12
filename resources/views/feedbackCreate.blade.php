@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="card bg-white" style="width: 30rem;">
        <form action="{{route('createFeedback')}}" method="POST">
            @csrf
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Adicionar Feedback</h4>
                    </div>

                    <div class="row mt-2 justify-content-center">
                        <div class="col-md-6"><label class="labels">Nota do Atendimento</label><input type="number" class="form-control" name="notaatendimento" placeholder="número" required></div>
                        <div class="col-md-6"><label class="labels">Nota do Serviço</label><input type="number" class="form-control" name="notaservico" placeholder="número" required></div>
                    </div>
                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-6 text-center"><button class="btn btn-primary" style="border: none; background-color: #000000">Adicionar Feedback</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection