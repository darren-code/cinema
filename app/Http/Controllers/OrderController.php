<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $order = Order::where('id',$id)->get();
        $orders = DB::table('transaction as t')
            ->join('paid_tickets as pt','t.id','=','pt.payment')
            // ->select('t.id','t.total','t.method','t.time','pt.payment')
            ->select('pt.payment')
            ->where('t.id',$id)
            ->get();
        return view('admin.orders.details',compact('order','orders'));
    }
    public function approve($id)
    {
        // Proses approve 

    }
}
