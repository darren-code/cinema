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
            'time' => 'required|unique:branch',
        ]);

        // Save data into database
        Branch::create([
            'time' => $req->time,
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
            'time'=>'required|unique:branch,time,'.$id.',id',
        ]);

        $branch->update([
            'time' => $req->time,
        ]);

        // Store message session
        $req->session()->flash('msg','Branch has been updated');
        
        // Redirect
        return redirect('admin/branch');
    }

    public function show($id)
    {
        $data = Branch::find($id);

        $branch = DB::table('branch as st')
        ->join('playing_relation as pr','st.id','=','pr.branch')
        ->join('studios as s','s.id','=','pr.studio')
        ->join('branch as b','b.id','=','pr.branch')
        ->select('st.time','s.name','s.class','b.location')
        ->where('st.id',$id)
        ->distinct('s.name')
        ->get();

        return view('admin.branch.details',compact('branch','data'));
    }

}