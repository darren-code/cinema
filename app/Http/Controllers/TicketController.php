<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $tickets = Ticket::all();

        return view('admin.tickets.index',compact('tickets'));
    }

    public function show($id)
    {
        $tickets = DB::table('tickets as t')
            ->join('transaction as tr','t.transaction','=','tr.id')
            ->join('users as u','u.id','=','tr.user')
            ->select('t.*','u.id as user_id','u.username')
            ->where('t.id',$id)
            ->get();

        return view('admin.tickets.details',compact('tickets'));
    }

    public function destroy($id)
    {
        // Delete Ticket
        Ticket::destroy($id);

        // Store message
        session()->flash('msg','Ticket has been deleted');

        //Redirect Page
        return redirect('admin/ticket');
    }


    public function create()
    {
        $data_playing = DB::table('playing_relation as pr')
            ->select('pr.*')
            ->get();

        $data_transaction = DB::table('transaction as t')
            ->select('t.*')
            ->get();

        $tickets = new Ticket();

        return view('admin.tickets.create',compact('data_playing','data_transaction'));

    }

    public function edit($id)
    {   
        $data_playing = DB::table('playing_relation as pr')
            ->select('pr.id')
            ->get();

        $data_transaction = DB::table('transaction as t')
            ->select('t.id')
            ->get();

        $tickets = DB::table('tickets as t')
            ->select('t.*')
            ->where('t.id',$id)
            ->get();

        return view('admin.tickets.edit ', compact('tickets','data_playing','data_transaction'));
    }

    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'seat' => 'required|max:8',
            'cost' => 'required|numeric',
            'transaction' => 'required',
            'playing' => 'required',
        ]);

        // Save data into database
        Ticket::create([
            'seat' => $req->seat,
            'cost' => $req->cost,
            'transaction' => $req->transaction,
            'playing' => $req->playing,
        ]);

        // Session Message
        $req->session()->flash('msg','New ticket has been added');

        // Redirect
        return redirect('/admin/ticket');
    }

    public function update(Request $req, $id)
    {
        // Find Ticket
        $tickets = Ticket::find($id);

        // Validate form
        $req->validate([
            'seat' => 'required|max:8',
            'cost' => 'required|numeric',
            'transaction' => 'required',
            'playing' => 'required',
        ]);
        
        $tickets->update([
            'seat' => $req->seat,
            'cost' => $req->cost,
            'transaction' => $req->transaction,
            'playing' => $req->playing,
        ]);

        // Store message session
        $req->session()->flash('msg','Ticket has been updated');
        
        // Redirect
        return redirect('admin/ticket');
    }

    /*
        User Panel
    */
    public function purchase(Request $req)
    {
        
    }
        
}
