<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /*
        Admin Panel
    */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
    public function show($id)
    {
        // Find the user
        $users = User::where('id',$id)->get();
        $order = Order::where('id',$id)->get();
        $orders = DB::table('transaction as t')
            ->join('paid_tickets as pt','t.id','=','pt.payment')
            ->select('t.id','t.total','t.method','t.time','pt.payment')
            ->where('t.id',$id)
            ->get();
        
        // Return array back to user details page
        return view('admin.users.details',compact('orders','order','users'));
    }

    /*
        User Panel
    */
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:6|unique:users',
            'email' => 'required|email|unique:users', // Works on associative array too
            'birthdate' => 'required|date|before:-3 years', // Restriksi Umur
            'password' => 'required|min:4',
        ], [
            'birthdate.before' => 'You are not old enough to register!' // Custom Error Message
        ]);

        $username = $request['username'];
        $email = $request['email'];
        $birthdate = $request['birthdate'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;
        $user->birthdate = $birthdate;
        $user->photo = 'default.jpg';

        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'username' => $request['username'],
            'password' => $request['password']
        ], (!empty($request['remember'])) ? true : false)) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile_picture($filename)
    {
        $file = Storage::disk('local')->get('profile/' . $filename);
        return new Response($file, 200);
    }

    public function profile()
    {
        return view('front.profile', [
            'user' => Auth::user()
        ]);
    }
}