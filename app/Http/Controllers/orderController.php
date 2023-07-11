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
        $order = Pedidos::find($id);
        $elder = Idosos::find($order->idoso_id);
        $user = User::find($elder->user_id);
        $service = TipoServico::find($order->service_id);
        return view('singleOrder', ['order' => $order, 'idoso' => $elder, 'user' => $user, 'service' => $service]);
    }
}
