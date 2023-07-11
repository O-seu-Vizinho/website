<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Idosos;
use App\Models\TipoServico;
use App\Models\User;

class orderController extends Controller
{
    public function allOrders() {
        return view('orderList', ['orders' => Pedidos::all()]);
    }

    public function getOrder($id) {
        $order = Pedidos::where('pedido_id', $id)->first();
        $elder = Idosos::where('idoso_id', $order->idoso_id)->first();
        $user = User::where('user_id', $elder->user_id)->first();
        $service = TipoServico::where('service_id', $order->service_id)->first();
        return view('singleOrder', ['order' => $order, 'idoso' => $elder, 'user' => $user, 'service' => $service]);
    }
}
