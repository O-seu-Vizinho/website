@extends('layouts.app')

@section('content')
        <title>O seu Vizinho - Pedidos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <style>
            h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            }

            .align-right {
                text-align: right;
            }

            .table {
            text-align: center;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }


        button {
            padding: 5px 10px;
            background-color: #17a2b8;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background-color: #000000;
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
        <h1>Pedidos</h1>
        @if (Auth::user()->role_id == 1)
        <div style="text-align: right">
            <button onclick="window.location='{{ "/createOrder" }}'">Adicionar pedido</button>
        </div>
        @endif
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
    </div>
@endsection

