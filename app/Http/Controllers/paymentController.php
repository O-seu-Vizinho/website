<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function createPayment(Request $request) {
        return view('paymentCreate', ['order' => $request->orderId]);
    }

    public function createPaymentPost(Request $request) {
        $pagamento = new Pagamento;
        $pagamento->custo_servico = $request->custo_serv;
        $pagamento->custo_comicao = $request->custo_com;
        $pagamento->save();
        $pedido = Pedidos::find($request->orderId);
        $pedido->pagamento_id = $pagamento->id;
        $pedido->save();
        return redirect("/order/" . $request->orderId);
    }
}
