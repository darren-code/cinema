<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $movies = Movie::all();

        return view('admin.movies.index',compact('movies'));
    }
    public function create()
    {
        $movies = new Movie();

        return view('admin.movies.create',compact('movies'));
    }
    public function destroy($id)
    {
        // Delete Movie
        Movie::destroy($id);

        // Store message
        session()->flash('msg','Movie has been deleted');

        //Redirect Page
        return redirect('admin/movies');
    }
    public function edit($id)
    {
        // Edit Movie
        $movies = Movie::find($id);
        return view('admin.movies.edit ', compact('movies'));
    }
    public function store(Request $req)
    {
        // Validate Form
        $req->validate([
            'title'=>'required',
            'director'=>'required',
            'avail' => 'required',
            'released' => 'required',
            'parental' => 'required',
            'synopsis'=>'required',
            'poster'=>'image|required',
            'trailer' => 'required',
        ]);

        // Upload image
        if($req->hasfile('image')){
            $image = $req->image;
            $image->move('poster',$image->getClientOriginalName());
        }

        // Save data into database
        Movie::create([
            'title' => $req->title,
            'director'=> $req->director,
            'avail' => $req->avail,
            'released' => $req->released,
            'parental' => $req->parental,
            'synopsis'=> $req->synopsis,
            'poster'=> rand().$req->poster->getClientOriginalName(),
            'trailer'=> $req->trailer,
        ]);

        // Session Message
        $req->session()->flash('msg','New movie has been added');

        // Redirect
        return redirect('/admin/movies');
    }
    public function update(Request $req, $id)
    {
        // Find Movie
        $movies = Movie::find($id);

        // Validate form
        $req->validate([
            'title'=>'required',
            'director'=>'required',
            'avail' => 'required',
            'released' => 'required',
            'parental' => 'required',
            'synopsis'=>'required',
            'poster'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'trailer' => 'required',
        ]);

        // Check if there is any image
        // if($req->hasFile('image')){
        //     //Check if the old image exists inside folder
        //     if(file_exists(public_path('uploads/').$movies->image)){
        //         unlink(public_path('uploads/').$movies->image);
        //     }
        //     // Upload the new image
        //     $image = $req->image;
        //     $image->move('poster',$image->getClientOriginalName());

        //     $movies->image = $req->image->getClientOriginalName();
        // }

        // If new image is in upload
        if($req->poster != ''){
            // Remove old image exists inside folder
            // Not yet

            $imageName = time().'.'.$req->poster->extension();  
    
            $req->poster->move(storage_path('app/poster'), $imageName);

            // Update Movie
            $movies->update([
                'title' => $req->title,
                'director'=> $req->director,
                'avail' => $req->avail,
                'released' => $req->released,
                'parental' => $req->parental,
                'synopsis'=> $req->synopsis,
                'poster'=> $imageName,
                'trailer'=> $req->trailer,
            ]);
        }else{
            $movies->update([
                'title' => $req->title,
                'director'=> $req->director,
                'avail' => $req->avail,
                'released' => $req->released,
                'parental' => $req->parental,
                'synopsis'=> $req->synopsis,
                'trailer'=> $req->trailer,
            ]);
        }      

        // Store message session
        $req->session()->flash('msg','Movie has been updated');
        
        // Redirect
        return redirect('admin/movies');
    }
    public function show($id)
    {
        $movies = Movie::find($id);
        return view('admin.movies.details',compact('movies'));
    }

    /*
        User Panel
    */

    public function home()
    {
        return view('front.movie.home', [
            'branches' => DB::table('branch')->orderBy('address', 'asc')->get()
        ]);
    }

    public function home_location($branch, Request $request)
    {
        $data = DB::table('playing_relation')
            ->join('movies', 'playing_relation.movie', '=', 'movies.id')
            ->join('branch', 'playing_relation.branch', '=', 'branch.id')
            ->select('movies.*', 'branch.*')
            ->where('branch.id', $branch)
            ->orderBy('movies.released', 'desc');

        /*
        $data = DB::table('playing_relation as p')
            ->join('branch as b', 'p.branch', '=', 'b.id')
            ->join('movies as m', 'p.movie', '=', 'm.id')
            ->join('studios as s', 'p.studio', '=', 's.id')
            ->join('showtimes as t', 'p.showtime', '=', 't.id')
            ->select('s.*', 'b.*', 'm.*', 't.*', 'p.*')->get();
        */

        $request->session()->put('location', $branch);
        
        return view('front.movie.home', [
            'nowready' => $data->where('movies.avail', 1)->take(4)->get(),
            'upcoming' => $data->where('movies.avail', 2)->take(4)->get(),
            'morefilm' => $data->where('movies.avail', 1)->take(8)->get()
        ]);
    }

    /*
    public function home()
    {
        $now_showing = Movie::where('avail', 1)->orderBy('released', 'desc')->take(4)->get();
        $coming_soon = Movie::where('avail', 2)->orderBy('released', 'desc')->take(4)->get();
        $more_result = Movie::where('avail', 1)->orderBy('released', 'desc')->take(8)->get();
        return view('front.movie.home', [
            'nowready' => $now_showing,
            'upcoming' => $coming_soon,
            'morefilm' => $more_result,
        ]);
    }
    */

    public function poster($filename)
    {
        $file = Storage::disk('local')->get('poster/' . $filename);
        return new Response($file, 200);
    }

    public function details($id)
    {
        $related = DB::table('playing_relation')
                    ->join('movies', 'playing_relation.movie', '=', 'movies.id')
                    ->join('studios', 'playing_relation.studio', '=', 'studios.id')
                    ->join('showtimes', 'playing_relation.showtime', '=', 'showtimes.id')
                    ->select('studios.*', 'showtimes.*', 'movies.*')
                    ->orderBy('time')
                    ->where('movies.id',$id)
                    ->get();

        return view('front.movie.movie', [
            'movie' => Movie::where('id', $id)->first(),
            'shows' => $related
        ]);
    }

    public function seats($id, $time)
    {
        $related = DB::table('playing_relation')
                    ->join('movies', 'playing_relation.movie', '=', 'movies.id')
                    ->join('studios', 'playing_relation.studio', '=', 'studios.id')
                    ->join('showtimes', 'playing_relation.showtime', '=', 'showtimes.id')
                    ->select('studios.*', 'showtimes.*', 'movies.*')
                    ->orderBy('name')
                    ->where('movies.id', $id)
                    ->where('showtimes.time', $time)
                    ->get();

        return view('front.movie.seat', [
            'movie' => Movie::where('id', $id)->first(),
            'shows' => $related,
            'time' => $time
        ]);
    }

    public function movie()
    {
        return view('front.movie.index', [
            'movies' => Movie::orderBy('released', 'desc')->take(20)->get()
        ]);
    }
}
