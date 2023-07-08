<!DOCTYPE html>
<html>
<head>
    <title>O seu vizinho - Perfil de {{$idoso->idoso_nome}}</title>
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
            border: 1px solid #ccc;
        }
        
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        
        td {
            background-color: #fff;
        }
        
        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Perfil de Idoso - {{$idoso->idoso_nome}}</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Pronome</th>
            <th>Telémovel</th>
            <th>Data de Nascimento</th>
            <th>Concelho</th>
            <th>Morada</th>
            <th>Código Postal</th>
            <th>Grau de Autonomia</th>
            <th>Descrição</th>
            <th>Gestor de Conta</th>
            <th>Outras Informações</th>
            <th>Informações Extra</th>
        </tr>
        <tr>
            <td>{{$idoso->idoso_nome}}</td>
            <td>{{$idoso->pronome}}</td>
            <td>{{$idoso->n_telemovel}}</td>
            <td>{{$idoso->data_nascimento}}</td>
            <td>{{$idoso->concelho}}</td>
            <td>{{$idoso->morada}}</td>
            <td>{{$idoso->codigo_postal}}</td>
            <td>{{$idoso->grau_autonomia}}</td>
            <td>{{$idoso->descricao}}</td>
            <td>{{$user->user_name}}</td>
            <td>{{$idoso->outras_infos}}</td>
            <td>{{$idoso->extra_info}}</td>                
        </tr>
    </table>
</body>
</html>
