<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Idosos;
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
            //$query->where('order', "NOT LIKE", '0%')->where('phoneNumber', 'LIKE', $request.'%')->orwhere('name', "LIKE", $request.'%');
        }
        $result = $query->get();
        //$result1 = json_decode(json_encode($result), true);
        $result2 = self::getUserElderly();
        /*foreach ($result1 as $user) {
            $result2 = array_merge($result2, [
                $user['user_id'] => self::getUserElderly($user['user_id'])
            ]);
        }*/

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

    public function getUserElderly() {
        return $result = Idosos::all();
    }
}
