<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'phone' => 'required|regex:/(08)[0-9]{9}/',
            'username' => 'required|min:6|unique:users',
            'email' => 'required|email|unique:users', // Works on associative array too
            'birthdate' => 'required|date|before:-3 years', // Restriksi Umur
            'password' => 'required|min:4',
        ], [
            'birthdate.before' => 'You are not old enough to register!', // Custom Error Message
            'phone.regex' => 'Please type a valid phone number.',
        ]);
            // dd(preg_replace('/(\D)/','',Uuid::uuid1()));
        $id = substr(preg_replace('/(\D)/','',Uuid::uuid3(Uuid::NAMESPACE_DNS,$request['username'])), 0, 8);

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $phone = $request['phone'];
        $gender = $request['gender'];
        $username = $request['username'];
        $email = $request['email'];
        $birthdate = $request['birthdate'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->id = $id;
        $user->email = $email;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->phone = $phone;
        $user->gender = $gender;
        $user->username = $username;
        $user->password = $password;
        $user->birthdate = $birthdate;
        $user->photo = 'default.png';

        $user->save();

        Session::put('age', date_diff(date_create($birthdate), date_create('now'))->y); // Age Calculation 
        Auth::login($user, false);

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
            Session::put('age', date_diff(date_create(Auth::user()->birthdate), date_create('now'))->y); // Age Calculation
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['Invalid Credentials!']);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }

    public function profile_picture($filename)
    {
        $file = Storage::disk('local')->get('profile/' . $filename);
        return new Response($file, 200);
    }

    public function profile($id)
    {
        $history = DB::table('transaction as t')
                ->join('users as u','u.id','=','t.user')
                ->select('t.*')
                ->where('u.id',$id)
                ->get();

        $status = DB::table('transaction as t')
                ->join('users as u','u.id','=','t.user')
                ->join('paid_tickets as pt','t.id','=','pt.payment')
                ->select('t.*','pt.payment')
                ->where('u.id',$id)
                ->get();
        
        $rating = DB::table('users as u')
                ->join('review_relation as rr','rr.user','=','u.id')
                ->join('reviews as r','rr.review','=','r.id')
                ->select('r.*','rr.*')
                ->where('u.id',$id)
                ->get();

        
        return view('front.user.profile', [
            'user' => Auth::user(),
            'history' => $history,
            'rating' => $rating,
            'status' => $status,
        ]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        return view('front.user.edit ', compact('user'));
    }
    public function update(Request $req, $id)
    {
        dd($id);
        $user = Auth::user();

        $req->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'phone' => 'numeric',
        ]);
        
        $user->update([
            'firstname' => $req->firstname,
            'lastname'=> $req->lastname,
            'gender' => $req->gender,
            'phone' => $req->phone,
        ]);
        
        // Redirect
        // return redirect('profile/{id}',['id'=>$id]);
        // return redirect('')
    }
}
