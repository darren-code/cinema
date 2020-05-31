<?php

namespace App\Http\Controllers;

use App\Ticket;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'cost' => 'required|numeric|max:16',
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
            'cost' => 'required|numeric|max:16',
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
        $data = json_decode($req->seats);

        $id = substr(preg_replace('/(\D)/','',Uuid::uuid1()), 0, 8);

        DB::table('transaction')
        ->insert(
            [
                'id' => $id,
                'total' => $req->total,
                'method' => $req->method,
                'isPaid' => 0,
                'user' => Auth::user()->id,
            ]
        );

        $last = DB::table('transaction')
            ->orderBy('time', 'desc')
            ->first();

        for ($i = 0; $i < $req->count; $i++)
        {
            DB::table('tickets')
            ->insert(
                [
                    'seat' => $data[$i]->seat,
                    'playing' => $data[$i]->play,
                    'cost' => $data[$i]->cost,
                    'transaction' => $last->id
                ]
            );
        }

        return redirect('profile/' . Auth::user()->id);
    }
}
