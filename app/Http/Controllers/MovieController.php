<?php

namespace App\Http\Controllers;

use App\Movie;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
            'branches' => DB::table('branch')->orderBy('address', 'asc')->get(),
        ]);
    }

    public function movie($branch)
    {
        $movies = DB::table('movies as m')
            ->join('playing_relation as p', 'm.id', '=', 'p.movie')
            ->select('m.title', 'm.released', 'm.poster', 'm.id as mid', 'p.branch as bid')
            ->where('m.avail', 1)->where('p.branch', $branch);

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

        Session::put('location', $branch);
        
        return view('front.movie.home', [
            'nowready' => $movies->take(4)->get(),
            'upcoming' => $data->where('movies.avail', 2)->take(4)->get(),
            'morefilm' => DB::table('movies')->orderBy('released', 'asc')->take(8)->get(),
            'branches' => DB::table('branch')->orderBy('address', 'asc')->get(),
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

    public function details($branch, $id)
    {
        $related = DB::table('playing_relation')
                    ->join('movies', 'playing_relation.movie', '=', 'movies.id')
                    ->join('studios', 'playing_relation.studio', '=', 'studios.id')
                    ->join('showtimes', 'playing_relation.showtime', '=', 'showtimes.id')
                    ->join('branch', 'playing_relation.branch', '=', 'branch.id')
                    ->select('studios.*', 'showtimes.*', 'movies.*', 'branch.*')
                    ->orderBy('time')
                    ->where('movies.id', $id)
                    ->where('branch.id', $branch)
                    ->get();

        $genres = DB::table('genre_relation as gr')
            ->join('movies as m', 'gr.movie', '=', 'm.id')
            ->join('genres as g', 'gr.genre', '=', 'g.id')
            ->select('g.genre')
            ->where('gr.movie', $id)->get();

        $movie = Movie::where('id', $id)->first();

        if (Session::get('age') < $movie->parental)
        {
            return redirect()->back()->withErrors(Session::get('age') . ' < ' . $movie->parental);
        }

        return view('front.movie.movie', [
            'movie' => $movie,
            'shows' => $related,
            'branches' => DB::table('branch')->orderBy('address', 'asc')->get(),
            'genres' => $genres,
        ]);
    }

    public function seats($branch, $id, $time)
    {
        $related = DB::table('playing_relation')
                    ->join('movies', 'playing_relation.movie', '=', 'movies.id')
                    ->join('studios', 'playing_relation.studio', '=', 'studios.id')
                    ->join('showtimes', 'playing_relation.showtime', '=', 'showtimes.id')
                    ->join('branch', 'playing_relation.branch', '=', 'branch.id')
                    ->select('studios.*', 'showtimes.*', 'movies.*', 'branch.*')
                    // ->select('movies.*')
                    ->orderBy('name')
                    ->where('movies.id', $id)
                    ->where('showtimes.time', $time)
                    ->where('branch.id', $branch)
                    ->get();

        return view('front.movie.seat', [
            'movie' => Movie::where('id', $id)->first(),
            'shows' => $related,
            'time' => $time,
            'branches' => DB::table('branch')->orderBy('address', 'asc')->get(),
        ]);
    }

    public function browse_movies()
    {
        return view('front.movie.browse', [
            'movies' => Movie::get(),
            'genres' => DB::table('genres')->get(),
        ]);
    }

    public function browse(Request $request)
    {
        $query = $request['search'];
        $order = $request['orderBy'];
        $rating = $request['parental'];
        $genre = $request['category'];
        $year = $request['year'];

        switch ($order)
        {
            case 'id' :
                $param1 = 'id';
                $param2 = 'asc';
                break;
            case 'asc' :
                $param1 = 'released';
                $param2 = 'asc';
                break;
            case 'desc' :
                $param1 = 'released';
                $param2 = 'desc';
                break;
            case 'title' :
                $param1 = 'title';
                $param2 = 'asc';
                break;
        }

        $age = 0;
        switch ($rating)
        {
            case 'G' :
                $age = 0;
                break;
            case 'PG' :
                $age = 10;
                break;
            case 'PG-13' :
                $age = 13;
                break;
            case 'R' :
                $age = 16;
                break;
            case 'NC-17' :
                $age = 18;
                break;
        }

        if (empty($genre))
        {
            $result = DB::table('movies as m');
        }
        else
        {
            $result = DB::table('genre_relation as gr')
            ->join('movies as m', 'm.id', '=', 'gr.movie')
            ->join('genres as g', 'g.id', '=', 'gr.genre')
            ->select('m.*')
            ->where('g.genre', $genre);
        }
        $result = $result
            ->whereYear('m.released', $year)
            ->where('m.parental', $age)
            ->where('m.title', 'like', '%' . $query . '%')
            ->orderBy($param1, $param2)
            ->get();

        return view('front.movie.browse', [
            'movies' => $result,
            'genres' => DB::table('genres')->get(),
        ]);
    }

    /*
    public function movie()
    {
        return view('front.movie.index', [
            'movies' => Movie::orderBy('released', 'desc')->take(20)->get()
        ]);
    }
    */
}
