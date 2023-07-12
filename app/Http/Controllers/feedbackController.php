<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Pedidos;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    public function createFeedback() {
        return view('feedbackCreate');
    }

    public function createFeedbackPost(Request $request) {
        $feedback = new Feedback;
        $feedback->atendimento = $request->notaatendimento;
        $feedback->serviço = $request->notaservico;
        $feedback->save();
        $pedido = Pedidos::find(1);
        $pedido->feedback_id = $feedback->id;
        $pedido->save();
        return redirect("/order/" . $request->orderId);
    }
}
