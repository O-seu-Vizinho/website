<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Idosos;
use App\Models\Pedidos;
use App\Models\TipoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    public function createOrder() {
        //$user = Auth::user();
        //$idosos = Idosos::where('user_id', $user->id);
        $idosos = Idosos::all();
        return view('orderCreate', ['idosos' => $idosos, 'services' => TipoServico::all()]);
    }

    public function createOrderPost(Request $request){
        if($request->recorrente == NULL)
            $request->recorrente = 0;
        $order = new Pedidos;
        $order->idoso_id = $request->idoso;
        $order->service_id = $request->servico;
        $order->data_servico = $request->dataserv;
        $order->local_partida = $request->partida;
        $order->local_chegada = $request->chegada;
        $order->hora_partida = $request->hpartida;
        $order->hora_chegada =$request->hchegada;
        $order->n_pessoas =$request->npessoas;
        $order->servico_recorrente =$request->recorrente;
        $order->extra_info =$request->extrainfo;
        $order->tempo_chamada =$request->tchamada;
        $order->tempo_espera =$request->tespera;
        $order->admin_id = Auth::user()->id;
        $order->save();

        return redirect('/order');
    }

}
