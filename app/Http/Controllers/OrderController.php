<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('transaction as t')
            ->join('users as u','u.id','=','t.user')
            ->select('t.id','t.total','t.method','t.time','u.username')
            ->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function show($id)
    {
        $users = User::where('id',$id)->get();
        $order = Order::where('id',$id)->get();
        $orders = DB::table('transaction as t')
            ->join('paid_tickets as pt','t.id','=','pt.payment')
            ->select('t.id','t.total','t.method','t.time','pt.payment')
            ->where('t.id',$id)
            ->get();
        return view('admin.orders.details',compact('order','orders','users'));
    }
}
