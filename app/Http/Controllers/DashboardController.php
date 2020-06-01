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

        $gender = response()->json(
            DB::table('users as u')
                ->select('u.gender',DB::raw('count(gender) as total'))
                ->groupBy('u.gender')
                ->get()
        );

        return view('admin.dashboard',
            compact('movies','orders','user','studio','tickets','branch','gender')
        );
    } 
    public function gender()
    {
        $gender = response()->json(
            DB::table('users as u')
                ->select('u.gender',DB::raw('count(gender) as total'))
                ->groupBy('u.gender')
                ->get()
        );
        return response()->json($gender)->original;
    }

    public function date()
    {

        $date = response()->json(
            DB::table('users')
                ->select(DB::raw("DATE_FORMAT(created,'Week %U in %Y') as Week"),DB::raw('COUNT(*) as total'))
                ->groupBy("Week")
                ->orderBy("Week")
                ->get()
        );
        return response()->json($date)->original;
    }

    public function consent()
    {

        $consent = response()->json(
            DB::table('movies')
                ->select(DB::raw('COUNT(*) as total'),'parental')
                ->groupBy("parental")
                ->orderBy("parental")
                ->get()
        );
        return response()->json($consent)->original;
    }

    public function transaction()
    {

        $transaction = response()->json(
            DB::table('transaction')
                ->select(DB::raw("DATE_FORMAT(time,'Week %U in %Y') as Week"),DB::raw('SUM(total) as total'))
                ->groupBy("Week")
                ->orderBy("Week")
                ->get()
        );
        return response()->json($transaction)->original;
    }
    public function method()
    {
        $method = response()->json(
            DB::table('transaction')
                ->select(DB::raw('COUNT(*) as total'),'method')
                ->groupBy("method")
                ->orderBy("method")
                ->get()
        );
        return response()->json($method)->original;
    }
}
