<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class searchOrderController extends Controller
{
    public function find($id) {
        return view('singleorder', ['order' => Orders::query()->where('id','=',$id)->first()]);   
    }

    public function allOrders() {
        return view('orderlist', [
            'orders' => Orders::query()->get()]);
    }
}
