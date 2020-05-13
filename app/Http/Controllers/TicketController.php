<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $ticket = Ticket::all();

        return view('admin.tickets.index',compact('ticket'));
    }
    public function create()
    {
        $ticket = new Ticket();

        return view('admin.tickets.create',compact('ticket'));
    }
    public function store(Request $req)
    {
        $req->validate([
            'name'=>'required',
            // to be continued as db
        ]);
    }
}
