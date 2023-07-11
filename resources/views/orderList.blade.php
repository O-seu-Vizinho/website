<!DOCTYPE html>
<html>
    <head>
        <title>O seu Vizinho - Pedidos</title>
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
        </style>
    </head>
    <body>
        <h1>Pedidos</h1>
        <button type="button" onclick="window.location='{{ "http://127.0.0.1:8000/user" }}'">Criar pedido</button>
        <table>
            <tr>
                <th>Id</th>
                <th>Id_Idoso</th>
                <th>Data</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->idoso_id}}</td>
                <td>{{$order->created_at}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>