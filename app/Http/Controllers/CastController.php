<?php

namespace App\Http\Controllers;

use App\Cast;
use Ramsey\Uuid\Uuid;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CastController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $data = Cast::all();

        return view('admin.cast.index',compact('data'));
    }
    public function create()
    {
        $data = new Cast();

        return view('admin.cast.create',compact('data'));
    }
    public function destroy($id)
    {
        Cast::destroy($id);

        // Store message
        session()->flash('msg','Cast has been deleted');

        //Redirect Page
        return redirect('admin/cast');
    }
    public function edit($id)
    {
        $data = Cast::find($id);
        return view('admin.cast.edit ', compact('data'));
    }
    public function show($id)
    {
        $data = Cast::find($id);
        $cast_relation = DB::table('cast_relation as cr')
            ->join('movies as m','m.id','=','cr.movie')
            ->join('casts as c','c.id','=','cr.cast')
            ->select('m.title','m.id')
            ->where('c.id',$id)
            ->orderBy('m.id')
            ->get();

        return view('admin.cast.details ', compact('data','cast_relation')); 
    }
    public function store(Request $req)
    {
        $id = substr(preg_replace('/(\D)/', '', Uuid::uuid1()), 0, 8);

        // Validate Form
        $req->validate([
            'name'=>'required|max:256|unique:casts',
            'birthplace' => 'required|max:64',
            'birthdate' => 'required|date',
        ]);

        // Save data into database
        Cast::create([
            'id' => $id,
            'name'=> $req->name,
            'birthplace'=> $req->birthplace,
            'birthdate'=> $req->birthdate,
        ]);

        // Session Message
        $req->session()->flash('msg','New cast has been added');

        // Redirect
        return redirect('/admin/cast');
    }
    public function update(Request $req, $id)
    {
        $data = Cast::find($id);

        $req->validate([
            'name'=>'required|max:256|unique:casts,name,'.$id.',id',
            'birthplace' => 'required|max:64',
            'birthdate' => 'required|date',
        ]);

        $data->update([
            'name'=>$req->name,
            'birthplace' => $req->birthplace,
            'birthdate' => $req->birthdate,
        ]);

        // Store message session
        $req->session()->flash('msg','Cast has been updated');
        
        // Redirect
        return redirect('admin/cast');
    }
}
