<?php

namespace App\Http\Controllers;

use App\Genre;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $data = Genre::all();

        return view('admin.genre.index',compact('data'));
    }
    public function create()
    {
        $data = new Genre();

        return view('admin.genre.create',compact('data'));
    }
    public function destroy($id)
    {
        Genre::destroy($id);

        // Store message
        session()->flash('msg','Genre has been deleted');

        //Redirect Page
        return redirect('admin/genre');
    }
    public function edit($id)
    {
        $data = Genre::find($id);
        return view('admin.genre.edit ', compact('data'));
    }
    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'genre'=>'required|unique:genres',
        ]);

        // Save data into database
        Genre::create([
            'genre'=> $req->genre,
        ]);

        // Session Message
        $req->session()->flash('msg','New genre has been added');

        // Redirect
        return redirect('/admin/genre');
    }
    public function update(Request $req, $id)
    {
        $data = Genre::find($id);

        $req->validate([
            'genre'=>'required|unique:genres,genre,'.$id.',id',
        ]);

        $data->update([
            'genre' => $req->genre,
        ]);

        // Store message session
        $req->session()->flash('msg','Genre has been updated');
        
        // Redirect
        return redirect('admin/genre');
    }
}
