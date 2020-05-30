<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $orders = DB::table('transaction as t')
            ->join('users as u','u.id','=','t.user')
            ->select('t.id','t.total','t.method','t.time','t.isPaid','u.username')
            ->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function show($id)
    {
        $order = DB::table('transaction as t')
            ->join('users as u','u.id','=','t.user')
            ->select('t.id','t.total','t\.method','t.time','t.isPaid','u.username')
            ->where('t.id',$id)
            ->get();

        $tickets = DB::table('transaction as t')
            ->join('tickets as ti','t.id','=','ti.transaction')
            ->select('ti.*')
            ->where('t.id',$id)
            ->get();

        return view('admin.orders.details',compact('order','tickets'));
    }
    public function approve($id)
    {
        // Update order
        $order = Order::find($id);

        $order->update([
            'isPaid'=>1
        ]);

        // Store message session
        session()->flash('msg','Order has been approved.');

        // Redirect
        return redirect('admin/order');
    }
    public function pending($id)
    {
        // Update order
        $order = Order::find($id);

        $order->update([
            'isPaid'=>0
        ]);

        // Store message session
        session()->flash('msg','Order has been pending.');

        // Redirect
        return redirect('admin/order');
    }
}
