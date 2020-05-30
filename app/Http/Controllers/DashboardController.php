<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Movie;
use App\User;
use App\Order;
use App\Studio;
use App\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $movies = new Movie();
        $orders = new Order();
        $user = new User();
        $studio = new Studio();
        $tickets = new Ticket();
        $branch = new Branch();

        return view('admin.dashboard',
            compact('movies','orders','user','studio','tickets','branch')
        );
    } 
}
