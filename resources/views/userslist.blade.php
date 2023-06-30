<!DOCTYPE html>
<html>
<head>
    <title>O seu vizinho - Utilizadores</title>
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
            background-color: #c7c7c7be;
            color: #333;
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
    </style>
</head>
<body>
    <h1>Utilizadores</h1>
    
    <div class="form-container">
        <form action="/user" method="GET">
            <input type="search" id="phone" name="phone" placeholder="Procurar utilizadores" value="{{ $search ? $search : '' }}">
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
            <th>Pronome</th>
            <th>Saldo</th>
            <th>Concelho</th>
            <th>Pedido</th>
            <th>Último Pedido</th>
            <th>Subscrição</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['phoneNumber']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['pronoun']}}</td>
            <td>{{$user['wallet']}}</td>
            <td>{{$user['concelho']}}</td>
            <td>{{$user['order']}}</td>
            <td>{{$user['lastOrder']}}</td>
            <td>{{$user['subscriptionModel']}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>