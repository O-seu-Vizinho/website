<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\User;
use App\Models\Idosos;
use App\Models\Pedidos;
use App\Models\TipoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->role_id == 2)
            $elderlybymanagement= Idosos::where('user_id',$user->id)->get();
        else
            $elderlybymanagement= Idosos::all();
        $countElderly = $elderlybymanagement->count();

        $dataAtual = Carbon::now()->format('Y-m-d');

        $pedidosAll = Pedidos::all();
        $pedidosFiltrados = [];

        foreach ($pedidosAll as $pedido) {
            $dataServico = $pedido->data_servico;


            if ($dataServico === $dataAtual) {

                $pedidosFiltrados[] = $pedido;
            }
        }

        $pedidosAtivos = [];
        $authElderIds = [];

        foreach($elderlybymanagement as $elder) {
            $authElderIds[] = $elder->id;
        }

        $pedidosUser = Pedidos::whereIn('idoso_id', $authElderIds)->get();

        foreach ($pedidosUser as $pedido) {

            if ($pedido->pagamento_id == NULL) {
                $pedidosAtivos[] = $pedido;
            }

        }

        $countPedidosUser = count($pedidosAtivos);

        $servicos = Servico::all();

        $pedidos = $pedidosAll->sortByDesc('id');
        if ($request->search) {
            $pedidos = Pedidos::join('idosos', 'pedidos.idoso_id', '=', 'idosos.id')
            ->where('nome', 'LIKE', $request->search.'%')
            ->get();
        }
        $services = TipoServico::all();
        $countusers = User::all()->count();
        return view('home')->with(['elderly'=> $elderlybymanagement,'servicos'=>$servicos, 'orders'=>$pedidosFiltrados, 'services'=>$services, 'search'=>$request->search, 'countelderly' => $countElderly, 'countusers' => $countusers, 'countPedidosUser' => $countPedidosUser, 'dataAtual'=>$dataAtual]);
    }
}
