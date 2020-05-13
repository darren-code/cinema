<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function home()
    {
        $now_showing = Movie::where('avail', 1)->orderBy('released', 'desc')->take(4)->get();
        $coming_soon = Movie::where('avail', 2)->orderBy('released', 'desc')->take(4)->get();
        $more_result = Movie::where('avail', 1)->orderBy('released', 'desc')->take(8)->get();
        return view('front/home', [
            'nowready' => $now_showing,
            'upcoming' => $coming_soon,
            'morefilm' => $more_result,
        ]);
    }

    public function poster($filename)
    {
        $file = Storage::disk('local')->get('poster/' . $filename);
        return new Response($file, 200);
    }
}
