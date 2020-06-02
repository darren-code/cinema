<?php

namespace App\Http\Controllers;

use App\Showtime;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShowtimeController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $showtime = Showtime::all();
        return view('admin.showtime.index',compact('showtime'));
    }

    public function destroy($id)
    {
        // Delete Studio
        Showtime::destroy($id);

        // Store message
        session()->flash('msg','Airtime has been deleted');

        //Redirect Page
        return redirect('admin/showtime');
    }

    public function create()
    {   
        $showtime = new Showtime();

        return view('admin.showtime.create',compact('showtime'));
    }

    public function store(Request $req)
    {
        $id = substr(preg_replace('/(\D)/', '', Uuid::uuid1()), 0, 8);

        // Validate Form
        $req->validate([
            'time' => 'required|unique:showtimes',
        ]);

        // Save data into database
        Showtime::create([
            'id' => $id,
            'time' => $req->time,
        ]);

        // Session Message
        $req->session()->flash('msg','New Airtime has been added');

        // Redirect
        return redirect('/admin/showtime');
    }

    public function edit($id)
    {
        // Edit Showtime
        $showtime = Showtime::find($id);
        return view('admin.showtime.edit ', compact('showtime'));
    }

    public function update(Request $req, $id)
    {
        // Find Showtime
        $showtime = Showtime::find($id);

        // Validate form
        $req->validate([
            'time'=>'required|unique:showtimes,time,'.$id.',id',
        ]);

        $showtime->update([
            'time' => $req->time,
        ]);

        // Store message session
        $req->session()->flash('msg','Airtime has been updated');
        
        // Redirect
        return redirect('admin/showtime');
    }

    public function show($id)
    {
        $data = Showtime::find($id);

        $showtime = DB::table('showtimes as st')
        ->join('playing_relation as pr','st.id','=','pr.showtime')
        ->join('studios as s','s.id','=','pr.studio')
        ->join('branch as b','b.id','=','pr.branch')
        ->select('st.time','s.name','s.class','b.location')
        ->where('st.id',$id)
        ->distinct('s.name')
        ->get();

        return view('admin.showtime.details',compact('showtime','data'));
    }

}