<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Movie;
use App\User;
use App\Order;
use App\Studio;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

        $user_graph = response()->json(
            DB::table('users as u')
                ->select('u.id','u.gender','u.created')
                ->get()
        );

        return view('admin.dashboard',
            compact('movies','orders','user','studio','tickets','branch','user_graph')
        );
    } 
    public function chart()
    {

    }
}
