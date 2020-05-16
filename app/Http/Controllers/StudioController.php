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

    public function details($id)
    {
        $title = DB::table('studios as s')
            ->where('id',$id)
            ->get();

        $studio = DB::table('studios as s')
            ->join('playing_relation as pr','s.id','=','pr.studio')
            ->join('movies as m','m.id','=','pr.movie')
            ->join('showtimes as st','st.id','=','pr.showtime')
            ->select('s.*','m.*','st.*')
            ->orderBy('time')
            ->where('s.id',$id)
            ->get();

        return view('admin.studio.details',compact('studio','title'));
    }
    public function seat($id,$time)
    {
        $title = DB::table('studios as s')
            ->join('playing_relation as pr','s.id','=','pr.studio')
            ->join('movies as m','m.id','=','pr.movie')
            ->join('showtimes as st','st.id','=','pr.showtime')
            ->select('s.name','m.title','st.time')
            ->where('s.id',$id)
            ->limit(1)
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
}
