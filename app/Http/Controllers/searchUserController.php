<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\elderlyController;

class searchUserController extends Controller
{
    public function allUsers() {
        $request = request('search');
        $filter = request('filter');
        $query =  self::allUsersQuery();
        if ($request) {
            $query->where('users.n_telemovel', 'LIKE', $request.'%')->orwhere('users.name', "LIKE", $request.'%');
        }

        if($filter) {
            $query = self::allUsersQuery();
            $query->where(function ($query) use ($request) {
                $query->where('users.n_telemovel', 'LIKE', $request.'%')
                      ->orWhere('users.name', 'LIKE', $request.'%');
            })
            ->having('pedidos', '>', 0);
        }
        $result = $query->get();
        $result2 = elderlyController::getElderly();

        return view('userslist', ['users' => json_decode(json_encode($result), true),
        'idosos' => $result2,
        'filter' => $filter,
        'search' => $request
    ]);
    }

    public function singleUser($id) {
        $user = User::find($id);
        $transacoes = Transacoes::where('id_user', $id)->get();
        return view('userProfile', ['user' => $user, 'transacoes' => $transacoes]);
    }

    public function allUsersQuery() {
        $result = User::query()
        ->leftJoin('idosos', 'users.id', '=', 'idosos.user_id')
        ->leftJoin('pedidos', 'idosos.id', '=', 'pedidos.idoso_id')
        ->groupBy('users.id', 'users.name', 'users.n_telemovel', 'users.email', 'users.concelho', 'salldo')
        ->select('users.id', 'users.name', DB::raw('count(pedidos.id) as pedidos'), 'users.n_telemovel', 'users.email', 'users.concelho', 'salldo');
        return $result;
    }

    public function createTransaction(Request $request) {
        return view('transactionCreate', ['userId'=>$request->userId]);
    }

    public function createTransactionPost(Request $request) {
        $user = User::find($request->userId);

            $transaction = new Transacoes;
            $transaction->id_user = $request->userId;
            $transaction->valor = $request->valor;
            $transaction->save();
            $user = User::find($request->userId);
            $user->salldo = $user->salldo + $request->valor;
            $user->save();

        return redirect('/user/'.$request->userId);
    }

    public static function getUser($id) {
       return User::find($id);
    }

}
