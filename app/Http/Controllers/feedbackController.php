<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Pedidos;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    public function createFeedback(Request $request) {
        return view('feedbackCreate', ['order' => $request->orderId]);
    }

    public function createFeedbackPost(Request $request) {
        $feedback = new Feedback;
        $feedback->atendimento = $request->notaatendimento;
        $feedback->serviço = $request->notaservico;
        $feedback->save();
        $pedido = Pedidos::find($request->orderId);
        $pedido->feedback_id = $feedback->id;
        $pedido->save();
        return redirect("/order/" . $request->orderId);
    }
}
