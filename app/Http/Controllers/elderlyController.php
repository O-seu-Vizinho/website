<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\searchUserController;
use App\Models\Idosos;
use Illuminate\Support\Facades\Auth;

class elderlyController extends Controller
{
    public function createElderlyPost(Request $request){
        $idoso= new Idosos;
        $idoso->user_id= Auth::user()->id;
        $idoso->nome= $request->nome ;
        $idoso->pronome=$request->pronome;
        $idoso->n_telemovel=$request->n_telemovel;
        $idoso->data_nascimento=$request->data_nascimento;
        $idoso->morada=$request->morada;
        $idoso->codigo_postal=$request->codigo_postal;
        $idoso->concelho=$request->concelho;
        $idoso->grau_autonomia=$request->grau_autonomia;
        $idoso->descricao=$request->descricao;
        $idoso->outras_infos=$request->outras_infos;
        $idoso->save();

        return redirect('/elderlyAll');
    }
    public function createElderly(){
        return view('elderlyCreate');
    }
    public function allElderly(){
        $idosos = Idosos::all();
        return view('elderlyAll')->with(['idosos'=> $idosos]);
    }
    public function getElder($id) {
        $idoso = Idosos::where('id', $id)->first();
        $userResponsavel = searchUserController::getUser($idoso->user_id);
        return view('elderProfile', ['idoso' => $idoso, 'user' => $userResponsavel]);
    }

    public static function getElderly() {
        return Idosos::all();
    }
}
