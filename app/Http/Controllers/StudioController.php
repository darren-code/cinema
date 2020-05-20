<?php

namespace App\Http\Controllers;

use App\Studio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        $studio = Studio::all();
        return view('admin.studio.index',compact('studio'));
    }

    public function show($id)
    {
        $title = DB::table('studios as s')
            ->where('s.id',$id)
            ->get();

        $studio = DB::table('studios as s')
            ->join('playing_relation as pr','s.id','=','pr.studio')
            ->join('movies as m','m.id','=','pr.movie')
            ->join('showtimes as st','st.id','=','pr.showtime')
            ->join('branch as b','b.id','=','pr.branch')
            ->select('s.id','s.name','m.title','st.time','b.location')
            ->orderBy('time')
            ->where('s.id',$id)
            ->get();

        return view('admin.studio.details',compact('studio','title'));
    }
    public function seat($id,$time)
    {
        $title = DB::table('studios as s')
            ->join('playing_relation as pr','s.id','=','pr.studio')
            ->join('branch as b','b.id','=','pr.branch')
            ->join('movies as m','m.id','=','pr.movie')
            ->join('showtimes as st','st.id','=','pr.showtime')
            ->select('s.id','s.name','m.title','st.time','b.location')
            ->where('s.id',$id)
            ->where('st.time',$time)
            ->get();

        $studio = DB::table('studios as s')
            ->join('playing_relation as pr','s.id','=','pr.studio')
            ->join('tickets as t','pr.id','=','t.playing')
            ->join('showtimes as st','st.id','=','pr.showtime')
            ->select('t.row','t.seat')
            ->where('s.id',$id)
            ->where('st.time',$time)
            ->get();

        return view('admin.studio.seat',compact('studio','title'));
    }

    public function create()
    {
        $studio = new Studio();

        return view('admin.studio.create',compact('studio'));
    }
    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'name'=>'required|max:30',
            'class'=>'required',
        ]);

        // Save data into database
        Studio::create([
            'name' => $req->name,
            'class'=> $req->class,
        ]);

        // Session Message
        $req->session()->flash('msg','New studio has been added');

        // Redirect
        return redirect('/admin/studio');
    }
    public function destroy($id)
    {
        // Delete Studio
        Studio::destroy($id);

        // Store message
        session()->flash('msg','Studio has been deleted');

        //Redirect Page
        return redirect('admin/studio');
    }
    public function edit($id)
    {
        // Edit Studio
        $studio = Studio::find($id);
        return view('admin.studio.edit ', compact('studio'));
    }
    public function update(Request $req, $id)
    {
        // Find Studio
        $studio = Studio::find($id);

        // Validate form
        $req->validate([
            'name'=>'required|max:30',
            'class'=>'required',
        ]);
        
        $studio->update([
            'name' => $req->name,
            'class'=> $req->class,
        ]);
        

        // Store message session
        $req->session()->flash('msg','Studio has been updated');
        
        // Redirect
        return redirect('admin/studio');
    }
}
