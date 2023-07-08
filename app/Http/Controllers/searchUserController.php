<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\elderlyController;
use Illuminate\Support\Facades\DB;

class searchUserController extends Controller
{
    public function allUsers() {
        $request = request('search');
        $filter = request('filter');
        $query =  self::allUsersQuery();
        if ($request) {
            $query->where('users.n_telemovel', 'LIKE', $request.'%')->orwhere('users.user_name', "LIKE", $request.'%');
        }
    
        if($filter) {
            $query = self::allUsersQuery();
            $query->where(function ($query) use ($request) {
                $query->where('users.n_telemovel', 'LIKE', $request.'%')
                      ->orWhere('users.user_name', 'LIKE', $request.'%');
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

    public function allUsersQuery() {
        $result = User::query()
        ->leftJoin('idosos', 'users.user_id', '=', 'idosos.user_id')
        ->leftJoin('pedidos', 'idosos.idoso_id', '=', 'pedidos.idoso_id')
        ->groupBy('users.user_id', 'users.user_name', 'users.n_telemovel', 'users.email', 'users.concelho', 'saldo')
        ->select('users.user_id', 'users.user_name', DB::raw('count(pedidos.pedido_id) as pedidos'), 'users.n_telemovel', 'users.email', 'users.concelho', 'saldo');
        return $result;
    }

    public static function getUser($id) {
       return User::where('user_id', $id)->first();
    }
}
