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
            color: black;
        }
    </style>

    <div class="container">
        <div class="row justify-content-between align-items-center" style="margin-bottom: 3rem;">
            <div class="col-md-3 col-sm-12" >
                <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto; border-radius:10px;margin-top:1rem;">
                    <h4 style="padding-top: 0.5rem">Saldo</h4>
                    <h3 style="padding-bottom: 0.5rem"><b>0€</b></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-12" >
                <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto;border-radius:10px;margin-top:1rem;">
                    <h4 style="padding-top: 0.5rem">Idosos</h4>
                    <h3 style="padding-bottom: 0.5rem"><b>0</b></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-12" >
                <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto;border-radius:10px;margin-top:1rem;">
                    <h4 style="padding-top: 0.5rem">Transações</h4>
                    <h3 style="padding-bottom: 0.5rem"><b>0</b></h3>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Vizualizar Pedidos</h2>
            <a href="/createOrder" class="btn btn-primary">Criar Pedido</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="table-avatar" style="text-align: center;">

                            <div class="avatar-initials" style="margin: auto;">
                                @php
                                $names = explode(' ', "David Gabriel");
                                $initials = '';
                                foreach ($names as $name) {
                                    $initials .= strtoupper(substr($name, 0, 1));
                                }
                                echo $initials;
                                @endphp
                            </div>

                        </td>
                        <td>Teste</td>
                        <td>Teste</td>

                        <td class="table-icons">
                            <!--<button class="btn btn-primary" title="Visualizar" data-bs-toggle="tooltip" data-bs-placement="top">
                                <i class="fas fa-eye"></i>
                            </button>-->
                            <button class="btn btn-info" title="Informações" data-bs-toggle="modal" data-bs-target="#logsModal">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>

@endsection
