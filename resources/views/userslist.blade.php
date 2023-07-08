<!DOCTYPE html>
<html>
<head>
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
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        } 
        
        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4c77af;
            color:#fff;
        }
        
        td {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) td {
            background-color: #e6e6e6;
        }
        
        input[type="search"] {
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }
        
        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4c77af;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
        }
        
        input[type="submit"]:hover {
            background-color: #436797;
        }
        
        div.form-container {
            text-align: center;
            margin-bottom: 20px;
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
            color: #fff;
            background-color: #4c77af;
        }
        button {
            border-radius: 4px;
            border: none;
            background-color: #4c77af;
            color: #fff;
        }
        button:hover {
            background-color: #436797;
        }
        td.idoso {
            background-color: rgb(241, 241, 241);
        }
        table.tabela_idoso {
            margin-top: 0px;
            border: 4px solid #686868;
        }
        th.tabela_idoso {
            background-color: #c7c7c7be;
            color: #333;
        }
        td.tabela_idoso {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even).tabela_idoso td.tabela_idoso {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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
    
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Telemóvel</th>
            <th>Email</th>
            <th>Saldo</th>
            <th>Pedidos</th>
            <th>Concelho</th>
            <th>Idosos associados</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user['user_id']}}</td>
            <td>{{$user['user_name']}}</td>
            <td>{{$user['n_telemovel']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['saldo']}}</td>
            <td>{{$user['pedidos']}}</td>
            <td>{{$user['concelho']}}</td>
            <td>
                    <button onclick="toggleOldman(this, {{$user['user_id']}})">v</button>
            </td>
        </tr>
        @foreach ($idosos as $idoso)
        @if ($idoso->user_id == $user['user_id'])
        <tr style="display: none" class="{{$user['user_id']}}">
            <td colspan=8 class="idoso">
                <table class="tabela_idoso">
                    <tr class="tabela_idoso">
                        <th class="tabela_idoso">Id de idoso</th>
                        <th class="tabela_idoso">Nome</th>
                        <th class="tabela_idoso">Telemóvel</th>
                        <th class="tabela_idoso">Data de nascimento</th>
                        <th class="tabela_idoso">Grau de Autonomia</th>
                    </tr>
                    <tr class="tabela_idoso">
                        <td class="tabela_idoso"><a href="http://127.0.0.1:8000/elderly/{{$idoso->idoso_id}}">{{$idoso->idoso_id}}</a></td>
                        <td class="tabela_idoso">{{$idoso->idoso_nome}}</td>
                        <td class="tabela_idoso">{{$idoso->n_telemovel}}</td>
                        <td class="tabela_idoso">{{$idoso->data_nascimento}}</td>
                        <td class="tabela_idoso">{{$idoso->grau_autonomia}}</td>
                    </tr>
                </table>
            </td>
        </tr>

        @else
        <div></div>
        @endif
        @endforeach
        @endforeach
    </table>
</body>
</html>