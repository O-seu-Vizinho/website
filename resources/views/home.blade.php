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
        a {
            color: inherit;
            text-decoration: none;
        }
    </style>

    <div class="container">

        <div class="row justify-content-center align-items-center" style="margin-bottom: 3rem;">
            @if(Auth::user()->role_id == 2)
            <div class="col-md-3 col-sm-12" >
                <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto; border-radius:10px;margin-top:1rem;">
                    <h4 style="padding-top: 0.5rem">Saldo</h4>
                    <h3 style="padding-bottom: 0.5rem"><b>{{Auth::user()->salldo}}€</b></h3>
                </div>
            </div>
            @endif
            <div class="col-md-3 col-sm-12" >
                <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto;border-radius:10px;margin-top:1rem;">
                    <h4 style="padding-top: 0.5rem">Idosos</h4>
                    <h3 style="padding-bottom: 0.5rem"><b>{{$countelderly}}</b></h3>
                </div>
            </div>
            @if(Auth::user()->role_id == 2)
            <div class="col-md-3 col-sm-12" >
                <div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto;border-radius:10px;margin-top:1rem;">
                    <h4 style="padding-top: 0.5rem">Transações</h4>
                    <h3 style="padding-bottom: 0.5rem"><b>0</b></h3>
                </div>
            </div>
            @endif
            @if (Auth::user()->role_id == 1)
            <div class="col-md-3 col-sm-12" >
                <a href="/user"><div class="text-center shadow" style="background-color: #e6e6e6; height:auto;width:auto;border-radius:10px;margin-top:1rem;">
                    <h4 style="padding-top: 0.5rem">Gestores de Conta</h4>
                    <h3 style="padding-bottom: 0.5rem"><b>{{$countusers}}</b></h3>
                </div></a>
            </div>
            @endif

        </div>
        @if (Auth::user()->role_id == 1)
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Visualizar Pedidos</h2>
            <div class="form-container">
                <form action="/home" method="GET" class="d-flex">
                    <div class="input-group">
                      <input type="search" id="search" name="search" class="form-control" placeholder="Procurar Pedidos" value="{{ $search ? $search : '' }}">
                      <div class="input-group-append">
                        <input type="submit" class="btn btn-primary" value="Pesquisar" style="background-color: #17a2b8; border: none">
                      </div>
                    </div>
                  </form>
                  
            </div>
            <a href="/createOrder" class="btn btn-primary" style="background-color: #17a2b8; border: none">Adicionar pedido</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id do Pedido</th>
                        <th>Id do Idoso</th>
                        <th>Nome do Idoso</th>
                        <th>Serviço</th>
                        <th>Status Pagamento</th>
                        <th>Status Faturação</th>
                        <th>Status Feedback</th>
                        <th>Data</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->idoso_id}}</td>
                        @foreach ($elderly as $elder)
                        @if ($elder->id == $order->idoso_id)
                        <td>{{$elder->nome}}</td>
                        @endif
                        @endforeach
                        @foreach ($services as $service)
                        @if ($service->id == $order->service_id)
                        <td>{{$service->nome}}</td>
                        @endif
                        @endforeach
                        @if ($order->pagamento_id == NULL)
                        <td><b>X</b></td>
                        @else
                        <td><i class="fa fa-check"></i></td>
                        @endif
                        @if($order->billed == 0)
                        <td><b>X</b></td>
                        @else
                        <td><i class="fa fa-check"></i></td>
                        @endif
                        @if ($order->feedback_id == NULL)
                        <td><b>X</b></td>
                        @else
                        <td><i class="fa fa-check"></i></td>
                        @endif
                        <td>{{$order->created_at}}</td>
                        <td><button type="button" onclick="window.location='{{ "/order/$order->id" }}'" class="btn btn-info" style="padding: 2px 6px;"><i class="fa fa-marker"></i></button></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif


        @if (Auth::user()->role_id == 2)
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Visualizar Idosos</h2>
            <a href="/createElderly" class="btn btn-primary" style="background-color: #17a2b8; border: none">Adicionar Idosos</a>
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

                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $elderly as $idoso)
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
                            <a href="elderly/{{$idoso->id}}" class="btn btn-primary" title="Visualizar" data-bs-toggle="tooltip" data-bs-placement="top">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>

@endsection
