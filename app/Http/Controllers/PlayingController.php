<?php

namespace App\Http\Controllers;

use App\Playing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlayingController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $playing = Playing::all();
        return view('admin.playing.index',compact('playing'));
    }

    public function destroy($id)
    {
        // Delete Studio
        Playing::destroy($id);

        // Store message
        session()->flash('msg','Allocation has been deleted');

        //Redirect Page
        return redirect('admin/playing');
    }

    public function details($id)
    {
        $playing = DB::table('studios as s')
            ->join('playing_relation as pr','s.id','=','pr.studio')
            ->join('movies as m','m.id','=','pr.movie')
            ->join('showtimes as st','st.id','=','pr.showtime')
            ->join('branch as b','b.id','=','pr.branch')
            ->select('pr.id','s.name','s.id as studio_id','m.title','m.id as mov_id','st.time','st.id as st_id','b.location','b.id as loc_id')
            ->orderBy('time')
            ->where('pr.id',$id)
            ->get();

        return view('admin.playing.details',compact('playing'));
    }

    public function create()
    {
        $data_movie = DB::table('movies as m')
            ->select('m.title','m.id')
            ->get();
        
        $data_showtime = DB::table('showtimes as st')
            ->select('st.time','st.id')
            ->get();

        $data_branch = DB::table('branch as b')
            ->select('b.location','b.id')
            ->get();

        $data_studio = DB::table('studios as s')
            ->select('s.name','s.id')
            ->get();        

        $playing = new Playing();

        return view('admin.playing.create',compact('playing','data_studio','data_movie','data_showtime','data_branch'));
    }

    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'studio' => 'required',
            'movie' => 'required',
            'showtime' => 'required',
            'branch' => 'required',
        ]);

        // Save data into database
        Playing::create([
            'studio' => $req->studio,
            'movie' => $req->movie,
            'showtime' => $req->showtime,
            'branch' => $req->branch,
        ]);

        // Session Message
        $req->session()->flash('msg','New studio allocation has been added');

        // Redirect
        return redirect('/admin/playing');
    }

}