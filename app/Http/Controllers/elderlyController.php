<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\searchUserController;
use App\Models\Idosos;

class elderlyController extends Controller
{
    public function getElder($id) {
        $idoso = Idosos::where('id', $id)->first();
        $userResponsavel = searchUserController::getUser($idoso->user_id);
        return view('elderProfile', ['idoso' => $idoso, 'user' => $userResponsavel]);
    }

    public static function getElderly() {
        return Idosos::all();
    }
}
