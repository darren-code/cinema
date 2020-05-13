<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $tickets = new Ticket();
        $orders = new Order();
        $user = new User();

        return view('admin.dashboard',
            compact('tickets','orders','user')
        );
    } 
}
