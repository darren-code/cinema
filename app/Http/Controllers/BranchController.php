<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $branch = Branch::all();
        return view('admin.branch.index',compact('branch'));
    }

    public function destroy($id)
    {
        // Delete Studio
        Branch::destroy($id);

        // Store message
        session()->flash('msg','Branch has been deleted');

        //Redirect Page
        return redirect('admin/branch');
    }

    public function create()
    {   
        $branch = new Branch();

        return view('admin.branch.create',compact('branch'));
    }

    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'location' => 'required',
            'country' => 'required',
            'state' => 'required',
            'province' => 'required',
            'town' => 'required',
            'zip_code' => 'required|numeric',
            'address' => 'required',
        ]);

        // Save data into database
        Branch::create([
            'location' => $req->location,
            'country' => $req->country,
            'state' => $req->state,
            'province' => $req->province,
            'town' => $req->town,
            'zip_code' => $req->zip_code,
            'address' => $req->address,
        ]);

        // Session Message
        $req->session()->flash('msg','New Branch has been added');

        // Redirect
        return redirect('/admin/branch');
    }

    public function edit($id)
    {
        // Edit Branch
        $branch = Branch::find($id);
        return view('admin.branch.edit ', compact('branch'));
    }

    public function update(Request $req, $id)
    {
        // Find Branch
        $branch = Branch::find($id);

        // Validate form
        $req->validate([
            'location' => 'required',
            'country' => 'required',
            'state' => 'required',
            'province' => 'required',
            'town' => 'required',
            'zip_code' => 'required|numeric',
            'address' => 'required',
        ]);

        $branch->update([
            'location' => $req->location,
            'country' => $req->country,
            'state' => $req->state,
            'province' => $req->province,
            'town' => $req->town,
            'zip_code' => $req->zip_code,
            'address' => $req->address,
        ]);

        // Store message session
        $req->session()->flash('msg','Branch has been updated');
        
        // Redirect
        return redirect('admin/branch');
    }

    public function show($id)
    {
        $data = Branch::find($id);

        $branch = DB::table('branch as b')
        ->join('playing_relation as pr','b.id','=','pr.branch')
        ->join('studios as s','s.id','=','pr.studio')
        ->select('s.name','s.class')
        ->where('b.id',$id)
        ->distinct('s.name')
        ->get();

        return view('admin.branch.details',compact('branch','data'));
    }

}