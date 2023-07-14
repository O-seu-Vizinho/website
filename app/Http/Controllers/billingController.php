<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;

class billingController extends Controller
{

    public function createBilling(Request $request) {
        return view('billingCreate', ['order' => $request->orderId]);
    }

    public function createBillingPost(Request $request)
    {
        $order = Pedidos::find($request->orderId);
        $order->billed = 1;
        $order->save();
        return redirect("/order/" . $request->orderId);
    }
}
