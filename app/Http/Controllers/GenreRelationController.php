<?php

namespace App\Http\Controllers;

use App\GenreRelation;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GenreRelationController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $data = DB::table('genre_relation as gr')
        ->join('movies as m','m.id','=','gr.movie')
        ->join('genres as g','g.id','=','gr.genre')
        ->select('m.title','m.id as movie_id','gr.*','g.genre','g.id as genre_id')
        ->get();

        return view('admin.genrerelation.index',compact('data'));
    }
    public function create()
    {

        $data_movie = DB::table('movies as m')
        ->select('m.title','m.id')
        ->get();

        $data_genre = DB::table('genres as g')
        ->select('g.*')
        ->get();

        $data = new GenreRelation();

        return view('admin.genrerelation.create',compact('data','data_movie','data_genre'));
    }
    public function destroy($id)
    {
        // Delete Genre Relation
        GenreRelation::destroy($id);

        // Store message
        session()->flash('msg','Genre Relation has been deleted');

        //Redirect Page
        return redirect('admin/genrerelation');
    }
    public function edit($id)
    {
        $data_movie = DB::table('movies as m')
        ->select('m.title','m.id')
        ->get();

        $data_genre = DB::table('genres as g')
        ->select('g.*')
        ->get();
        
        $data = GenreRelation::find($id);

        return view('admin.genrerelation.edit ', compact('data','data_genre','data_movie'));
    }
    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'genre'=>'required',
            'movie' => 'required',
        ]);

        // Save data into database
        GenreRelation::create([
            'genre'=> $req->genre,
            'movie' => $req->movie,
        ]);

        // Session Message
        $req->session()->flash('msg','New genre relation has been added');

        // Redirect
        return redirect('/admin/genrerelation');
    }
    public function update(Request $req, $id)
    {
        $data = GenreRelation::find($id);

        $req->validate([
            'genre'=>'required',
            'movie' => 'required',
        ]);

        // Store message session
        $req->session()->flash('msg','Genre Relation has been updated');
        
        // Redirect
        return redirect('admin/genrerelation');
    }

}
