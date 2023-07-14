@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>


        .table {
            text-align: center;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table-avatar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .table-avatar .avatar-initials {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ccc;
            color: #fff;
            font-size: 20px;
        }

        .table-icons .btn {
            background-color: transparent;
            border: none;
        }

        .table-icons .btn i {
            font-size: 1.2rem;
            color: black;        }
    </style>

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Visualizar Idosos</h2>
            <a href="/createElderly" class="btn btn-primary" style="background-color: #17a2b8; border:none">Adicionar Idoso</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Telemóvel</th>

                        <th>Data de Nascimento</th>
                        <th>Morada</th>
                        <th>Concelho</th>
                        <th>Codigo-Postal</th>
                        <th>Grau de Autonomia</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($idosos as $idoso)
                    <tr>
                        <td class="table-avatar" style="text-align: center;">

                            <div class="avatar-initials" style="margin: auto;">
                                @php
                                $names = explode(' ', $idoso->nome." ".$idoso->pronome );
                                $initials = '';
                                foreach ($names as $name) {
                                    $initials .= strtoupper(substr($name, 0, 1));
                                }
                                echo $initials;
                                @endphp
                            </div>

                        </td>
                        <td>{{$idoso->id}}</td>
                        <td>{{$idoso->nome." ".$idoso->pronome}}</td>
                        <td>{{$idoso->n_telemovel}}</td>
                        <td>{{$idoso->data_nascimento}}</td>
                        <td>{{$idoso->morada}}</td>
                        <td>{{$idoso->concelho}}</td>
                        <td>{{$idoso->codigo_postal}}</td>
                        <td>{{$idoso->grau_autonomia}}</td>


                        <td class="table-icons">
                            <!--<button class="btn btn-primary" title="Visualizar" data-bs-toggle="tooltip" data-bs-placement="top">
                                <i class="fas fa-eye"></i>
                            </button>-->
                            <a href="elderly/{{$idoso->id}}" class="btn btn-info" title="Informações">
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>

@endsection
