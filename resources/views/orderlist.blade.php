<!DOCTYPE html>
<html>
    <head>
        <title>O seu vizinho - Pedidos</title>
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
        </style>
    </head>
    <body>
        <h1>Pedidos</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>State</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <td><a href="/order/{{$order['id']}}">{{$order['id']}}</a></td>
                <td>{{$order['type']}}</td>
                <td>{{$order['state']}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>