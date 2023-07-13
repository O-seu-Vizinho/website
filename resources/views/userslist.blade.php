@extends('layouts.app')

@section('content')
    <title>O seu vizinho - Utilizadores</title>
    <script>
        function toggleOldman(button, id) {
            var elements = document.getElementsByClassName(id)
            for (let i = 0; i < elements.length; i++) {
                let element = elements[i];
                if (element.style.display == 'none')
                element.style.display = '';
             else
                element.style.display = 'none';
            }
        }
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        h1{
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        input[type="search"] {
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #424242;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
        }

        input[type="submit"]:hover {
            background-color: #000000;
        }

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
        .toggle-elders {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 25px;
            height: 25px;
            border-radius: 40%;
            background-color: #424242;
            color: #fff;
            border: none;
            font-size: 14px; /* Adjust the font size as desired */
        }
        div.form-container {
            text-align: center;
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        div.active-orders {
            display: inline;
            margin-left: 20px;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            color: #000000;
        }
    </style>
<div class="container">
    <h1>Utilizadores</h1>

    <div class="form-container">
        <form action="/user" method="GET">
            <input type="search" id="search" name="search" placeholder="Procurar utilizadores" value="{{ $search ? $search : '' }}">
            <input type="submit" value="Pesquisar">
            <div class="active-orders">
                Pedidos ativos:
                <input type="checkbox" id="filter" name="filter" onchange="submit()" {{ $filter ? 'checked' : '' }}>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Telemóvel</th>
                    <th>Email</th>
                    <th>Saldo</th>
                    <th>Pedidos</th>
                    <th>Concelho</th>
                    <th>Idosos associados</th>
                    <th>Info</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)   
                <tr>
                    <td class="table-avatar" style="text-align: center;">
                        <div class="avatar-initials" style="margin: auto;">
                            @php
                            $names = explode(' ', $user['name']);
                            $initials = '';
                            foreach ($names as $name) {
                                $initials .= strtoupper(substr($name, 0, 1));
                            }
                            echo $initials;
                            @endphp
                        </div>
                    </td>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['n_telemovel']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['salldo']}}€</td>
                    <td>{{$user['pedidos']}}</td>
                    <td>{{$user['concelho']}}</td>
                    <td> <button onclick="toggleOldman(this, {{$user['id']}})" class="toggle-elders">v</button></td>
                    <td class="table-icons">
                        <button class="btn btn-info" title="Informações" data-bs-toggle="modal" data-bs-target="#logsModal">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </td>
                </tr>
                @foreach ($idosos as $idoso)
                @if ($idoso->user_id == $user['id'])
                <tr style="display: none" class="{{$user['id']}}">
                    <td colspan=10 class="idoso">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Id de idoso</th>
                                    <th>Nome</th>
                                    <th>Telemóvel</th>
                                    <th>Data de nascimento</th>
                                    <th>Grau de Autonomia</th>
                                </tr>
                                <tr>
                                    <td><a href="/elderly/{{$idoso->id}}">{{$idoso->id}}</a></td>
                                    <td>{{$idoso->nome}}</td>
                                    <td>{{$idoso->n_telemovel}}</td>
                                    <td>{{$idoso->data_nascimento}}</td>
                                    <td>{{$idoso->grau_autonomia}}</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</div>
    @endsection
