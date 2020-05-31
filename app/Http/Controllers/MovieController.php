<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Order;
use App\Ticket;
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
            // new genre
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
        $genre = DB::table('movies as m')
            ->join('genre_relation as gr','gr.movie','=','m.id')
            ->join('genres as g','gr.genre','=','g.id')
            ->where('m.id',$id)
            ->select('g.genre')
            ->get();
        $cast = DB::table('movies as m')
            ->join('cast_relation as cr','cr.movie','=','m.id')
            ->join('casts as c','cr.cast','=','c.id')
            ->where('m.id',$id)
            ->select('c.name')
            ->get();
        return view('admin.movies.details',compact('movies','genre','cast'));
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
            ->select('m.title', 'm.released', 'm.poster', 'm.id as mid', 'p.branch as bid');

        $data = DB::table('playing_relation as pr')
            ->join('movies as m', 'pr.movie', '=', 'm.id')
            ->join('branch as b', 'pr.branch', '=', 'b.id')
            ->select('m.id as mid', 'b.*', 'm.title', 'm.poster', 'm.released')
            ->where('b.id', $branch)
            ->orderBy('m.released', 'desc');

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
            'nowready' => $movies->where('m.avail', 1)->where('p.branch', $branch)->take(4)->get(),
            'upcoming' => $data->where('m.avail', 2)->take(4)->get(),
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
                    ->select('studios.*', 'showtimes.*', 'movies.*', 'branch.*', 'showtimes.id as sid')
                    ->orderBy('time')
                    ->where('movies.id', $id)
                    ->where('branch.id', $branch)
                    ->get();

        $genres = DB::table('genre_relation as gr')
            ->join('movies as m', 'gr.movie', '=', 'm.id')
            ->join('genres as g', 'gr.genre', '=', 'g.id')
            ->select('g.genre')
            ->where('gr.movie', $id)->get();

        $casts = DB::table('cast_relation as cr')
            ->join('casts as c', 'cr.cast', '=', 'c.id')
            ->join('movies as m', 'cr.movie', '=', 'm.id')
            ->select('c.name')
            ->where('cr.movie', $id)->get();

        $rating = DB::table('reviews')
            ->where('movie', $id);

        $reviews = DB::table('reviews as r')
            ->join('users as u', 'r.user', '=', 'u.id')
            ->select('u.username', 'r.header', 'r.content', 'r.rating')
            ->where('movie', $id)
            ->orderBy('r.id', 'desc')
            ->take(3)
            ->get();

        $check = DB::table('reviews as r')
        ->where('user', Auth::user()->id)
        ->where('movie', $id)
        ->first();

        $flag = DB::table('tickets as t')
        ->join('transaction as p', 't.transaction', '=', 'p.id')
        ->join('playing_relation as n', 't.playing', '=', 'n.id')
        ->where('p.user', Auth::user()->id)
        ->where('n.movie', $id)
        ->first();

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
            'casts' => $casts,
            'rating' => $rating->avg('rating'),
            'reviews' => $reviews,
            'flag' => $check,
            'check' => $flag,
        ]);
    }

    public function seats($branch, $id, $time)
    {
        $related = DB::table('playing_relation')
                    ->join('movies', 'playing_relation.movie', '=', 'movies.id')
                    ->join('studios', 'playing_relation.studio', '=', 'studios.id')
                    ->join('showtimes', 'playing_relation.showtime', '=', 'showtimes.id')
                    ->join('branch', 'playing_relation.branch', '=', 'branch.id')
                    ->select('studios.*', 'showtimes.*', 'movies.*', 'branch.*', 'playing_relation.id as pid')
                    // ->select('movies.*')
                    ->orderBy('name')
                    ->where('movies.id', $id)
                    ->where('showtimes.time', $time)
                    ->where('branch.id', $branch)
                    ->get();

        $booked = DB::table('tickets as t')
            ->join('playing_relation as p', 'p.id', '=', 't.playing')
            ->join('showtimes as s', 's.id', '=', 'p.showtime')
            ->select('t.seat', 'p.id', 'p.studio', 's.time')
            ->where('p.movie', $id)
            ->where('p.branch', $branch)
            ->where('s.time', $time);

        $asec = DB::table('tickets as t')
            ->join('playing_relation as p', 'p.id', '=', 't.playing')
            ->join('showtimes as s', 's.id', '=', 'p.showtime')
            ->select('t.seat', 'p.id')
            ->where('p.movie', $id)
            ->where('p.branch', $branch)
            ->where('s.time', $time)
            ->where('t.seat', 'like', 'A%')->get();

        $bsec = DB::table('tickets as t')
            ->join('playing_relation as p', 'p.id', '=', 't.playing')
            ->join('showtimes as s', 's.id', '=', 'p.showtime')
            ->select('t.seat', 'p.id')
            ->where('p.movie', $id)
            ->where('p.branch', $branch)
            ->where('s.time', $time)
            ->where('t.seat', 'like', 'B%')->get();

        $csec = DB::table('tickets as t')
            ->join('playing_relation as p', 'p.id', '=', 't.playing')
            ->join('showtimes as s', 's.id', '=', 'p.showtime')
            ->select('t.seat', 'p.id')
            ->where('p.movie', $id)
            ->where('p.branch', $branch)
            ->where('s.time', $time)
            ->where('t.seat', 'like', 'C%')->get();

        $seat = DB::table('playing_relation')
            ->join('movies', 'playing_relation.movie', '=', 'movies.id')
            ->join('studios', 'playing_relation.studio', '=', 'studios.id')
            ->join('showtimes', 'playing_relation.showtime', '=', 'showtimes.id')
            ->join('branch', 'playing_relation.branch', '=', 'branch.id')
            ->join('tickets','playing_relation.id','=','tickets.playing')
            ->select('tickets.seat', 'playing_relation.id')
            ->where('movies.id', $id)
            ->where('showtimes.time', $time)
            ->where('branch.id', $branch)
            ->get();


        return view('front.movie.seat', [
            'movie' => Movie::where('id', $id)->first(),
            'shows' => $related,
            'time' => $time,
            'seat' => $seat,
            'branches' => DB::table('branch')->orderBy('address', 'asc')->get(),
            'asec' => $asec,
            'bsec' => $bsec,
            'csec' => $csec,
        ]);
    }

    public function checkout(Request $req,$id){
        // date_default_timezone_set('Asia/Jakarta');

        // $now = date('Y-m-d H:i:s');
        // dd($now);
        dd($req);
        $req->validate([
            'total'=> 'required|numeric',
            'method'=>'required',
            // 'seat' => 'required',
            // 'cost' => 'required|numeric',
            // 'playing' => 'required'
        ]);
        
        Order::create([
            'total'=> $req->total, // belum dapat
            'method' => $req->method,
            // 'time' => $now;
            'isPaid' => 0,
            'user' => Auth::user()->id,
        ]);

        // foreach
        Ticket::create([
            // 'seat' => $req->seats, // ubah ke json dulu 
            'cost' => $req->cost, 
            // 'transaction' => $req->transaction, // id transaksi
            'playing' => $req->playing,
        ]); 

        // return view('admin.front.movie');

    }

    public function browse_movies()
    {
        return view('front.movie.browse', [
            'movies' => Movie::paginate(16),
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

        /*
        Session::put('query', $query);
        Session::put('order', $order);
        Session::put('parental', $rating);
        Session::put('category', $genre);
        Session::put('year', $year);
        */

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

        if ($genre != 'default') // Dikarenekan belum seluruh film memiliki genre sehingga
        {
            $result = DB::table('genre_relation as gr')
            ->join('movies as m', 'm.id', '=', 'gr.movie')
            ->join('genres as g', 'g.id', '=', 'gr.genre')
            ->select('m.*')
            ->where('m.title', 'like', '%' . $query . '%')
            ->where('g.genre', $genre);
        }
        else
        {
            $result = DB::table('movies as m')->where('m.title', 'like', '%' . $query . '%');
        }

        if ($rating != 'default')
        {
            $result = $result->where('m.parental', '=', $age);
        }

        if ($year != 'default')
        {
            $result = $result->whereYear('m.released', '=', $year);
        }

        if ($order != 'default')
        {
            if (isset($param1) && isset($param2))
            {
                $result = $result->orderBy($param1, $param2);
            }
        }

        return view('front.movie.browse', [
            'movies' => $result->paginate(16),
            'genres' => DB::table('genres')->get(),
            'data' => $request->all(),
        ]);
    }

    public function comment(Request $request, $user, $movie)
    {
        $request->validate([
            'content' => 'max:512',
            'header' => 'max:64',
        ]);

        $last = DB::table('reviews')
            ->orderBy('id', 'desc')
            ->first();

        DB::table('reviews')
            ->insert(
                [
                    'id' => ($last->id + 1),
                    'content' => $request->content,
                    'header' => $request->header,
                    'user' => $user,
                    'movie' => $movie,
                    'rating' => $request->rating
                ]
            );

        return redirect()->route('movie.details', ['branch' => Session::get('location'), 'id' => $movie]);
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
