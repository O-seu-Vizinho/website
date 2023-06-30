<?php

namespace App\Http\Controllers;

use App\Models\UserTest;

class searchUserController extends Controller
{
    public function allUsers() {
        $request = request('phone');
        $filter = request('filter');
        $query =  UserTest::query();
        if ($request) {

            $query->where('phoneNumber', 'LIKE', $request.'%')->orwhere('name', "LIKE", $request.'%');
        }
    
        if($filter) {
            $query = UserTest::query();
            $query->where(function ($query) use ($request) {
                $query->where('phoneNumber', 'LIKE', $request.'%')
                      ->orWhere('name', 'LIKE', $request.'%');
            })
            ->where('order', 'NOT LIKE', '0%');
            //$query->where('order', "NOT LIKE", '0%')->where('phoneNumber', 'LIKE', $request.'%')->orwhere('name', "LIKE", $request.'%');
        }
        $result = $query->get();
        return view('userslist', ['users' => $result,
        'filter' => $filter,
        'search' => $request 
    ]);
    }
}
