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
            ->orderBy('t.id')
            ->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function destroy($id)
    {
        // Delete Order
        Order::destroy($id);

        // Store message
        session()->flash('msg','Order has been deleted');

        //Redirect Page
        return redirect('admin/order');
    }
    public function create()
    {
        $data_user = DB::table('users as u')
            ->select('u.username','u.id')
            ->get();

        $order = new Order();

        return view('admin.orders.create',compact('order','data_user'));

    }
    public function edit($id)
    {   
        $data_user = DB::table('users as u')
            ->select('u.username','u.id')
            ->get();

        $order = Order::find($id);

        return view('admin.orders.edit ', compact('order','data_user'));
    }
    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'total' => 'required|numeric|max:16',
            'method' => 'required',
            'isPaid' => 'required|numeric',
            'user' => 'required|numeric',
        ]);

        // Save data into database
        Order::create([
            'total' => $req->total,
            'method' => $req->method,
            // 'time' => now(),
            'isPaid' => $req->isPaid,
            'user' => $req->user,
        ]);

        // Session Message
        $req->session()->flash('msg','New order has been added');

        // Redirect
        return redirect('/admin/order');
    }
    public function update(Request $req, $id)
    {
        // Find Order
        $order = Order::find($id);

        // Validate form
        $req->validate([
            'total' => 'required|numeric|max:16',
            'method' => 'required',
            'isPaid' => 'required|numeric',
            'user' => 'required|numeric',
        ]);
        
        $order->update([
            'total' => $req->total,
            'method' => $req->method,
            // 'time' => now(),
            'isPaid' => $req->isPaid,
            'user' => $req->user,
        ]);

        // Store message session
        $req->session()->flash('msg','Order has been updated');
        
        // Redirect
        return redirect('admin/order');
    }
    public function show($id)
    {
        $order = DB::table('transaction as t')
            ->join('users as u','u.id','=','t.user')
            ->select('t.id','t.total','t.method','t.time','t.isPaid','u.username')
            ->where('t.id',$id)
            ->get();

        $tickets = DB::table('transaction as t')
            ->join('tickets as ti','t.id','=','ti.transaction')
            ->select('ti.*')
            ->where('t.id',$id)
            ->get();

        return view('admin.orders.details',compact('order','tickets'));
    }
    public function confirm($id)
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
        session()->flash('msg','Order changed to pending.');

        // Redirect
        return redirect('admin/order');
    }
}
