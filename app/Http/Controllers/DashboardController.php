<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use App\Order;
use App\Studio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $movies = new Movie();
        $orders = new Order();
        $user = new User();
        $studio = new Studio();

        return view('admin.dashboard',
            compact('movies','orders','user','studio')
        );
    } 
}
