<?php

namespace App\Http\Controllers;

use App\CastRelation;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CastRelationController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $data = DB::table('cast_relation as cr')
        ->join('movies as m','m.id','=','cr.movie')
        ->join('casts as c','c.id','=','cr.cast')
        ->select('m.title','m.id as movie_id','cr.*','c.name','c.id as cast_id')
        ->orderBy('cr.id')
        ->get();

        return view('admin.castrelation.index',compact('data'));
    }
    public function create()
    {
        $data_movie = DB::table('movies as m')
        ->select('m.title','m.id')
        ->orderBy('m.title')
        ->get();

        $data_cast = DB::table('casts as c')
        ->select('c.id','c.name')
        ->orderBy('c.name')
        ->get();

        $data = new CastRelation();

        return view('admin.castrelation.create',compact('data','data_movie','data_cast'));

    }
    public function destroy($id)
    {
        // Delete Genre Relation
        CastRelation::destroy($id);
        
        // Store message
        session()->flash('msg','Cast Relation has been deleted');

        //Redirect Page
        return redirect('admin/castrelation');
    }
    public function edit($id)   
    {
        $data_movie = DB::table('movies as m')
        ->select('m.title','m.id')
        ->orderBy('m.title')
        ->get();

        $data_cast = DB::table('casts as c')
        ->select('c.id','c.name')
        ->orderBy('c.name')
        ->get();
        
        $data = CastRelation::find($id);

        return view('admin.castrelation.edit ', compact('data','data_movie','data_cast'));
    }
    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'cast'=>'required|numeric',
            'movie' => 'required|numeric',
        ]);

        // Save data into database
        CastRelation::create([
            'cast'=> $req->cast,
            'movie' => $req->movie,
        ]);

        // Session Message
        $req->session()->flash('msg','New cast relation has been added');

        // Redirect
        return redirect('/admin/castrelation');
    }
    public function update(Request $req, $id)
    {
        $data = CastRelation::find($id);

        $req->validate([
            'genre'=>'required|numeric',
            'movie' => 'required|numeric',
        ]);

        $data->update([
            'cast'=> $req->cast,
            'movie' => $req->movie,
        ]);
        // Store message session
        $req->session()->flash('msg','Cast Relation has been updated');
        
        // Redirect
        return redirect('admin/castrelation');
    }

}
