<?php

namespace App\Http\Controllers;

use App\Models\Idosos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\searchUserController;

class elderlyController extends Controller
{
    public function createElderlyPost(Request $request){
        $idoso= new Idosos;
        if (Auth::user()->role_id == 1)
            $idoso->user_id=$request->userId;
        else
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
    public function createElderly(Request $request){
        return view('elderlyCreate', ['userId'=>$request->userId]);
    }
    public function allElderly(){
        if (Auth::user()->role_id == 1)
            $idosos = Idosos::all();
        else
            $idosos = Idosos::where('user_id', Auth::user()->id)->get();
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
