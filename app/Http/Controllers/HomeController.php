<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Idosos;
use App\Models\Pedidos;
use App\Models\TipoServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $pedidosAll = Pedidos::all();
        $pedidos = $pedidosAll->sortByDesc('id');
        if ($request->search) {
            $pedidos = Pedidos::join('idosos', 'pedidos.idoso_id', '=', 'idosos.id')
            ->where('nome', 'LIKE', $request->search.'%')
            ->get();
        }
        $services = TipoServico::all();
        $countusers = User::all()->count();
        return view('home')->with(['elderly'=> $elderlybymanagement,'orders'=>$pedidos, 'services'=>$services, 'search'=>$request->search, 'countelderly' => $countElderly, 'countusers' => $countusers]);
    }
}
