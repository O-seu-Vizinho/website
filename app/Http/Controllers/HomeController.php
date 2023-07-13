<?php

namespace App\Http\Controllers;

use App\Models\Idosos;
use App\Models\Pedidos;
use App\Models\TipoServico;
use Illuminate\Http\Request;

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
    public function index()
    {

        $elderlybymanagement= Idosos::where('user_id',2)->get();
        $pedidos = Pedidos::all();
        $services = TipoServico::all();
        return view('home')->with(['elderly'=> $elderlybymanagement,'orders'=>$pedidos, 'services'=>$services ]);
    }
}
