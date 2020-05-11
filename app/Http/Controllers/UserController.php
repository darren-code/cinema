<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:6|unique:users',
            'email' => 'required|email|unique:users',
            'birthdate' => 'required|date|before:-3 years', // Restriksi Umur
            'password' => 'required|min:4',
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
        $user->role = '0'; // 0 = regular user whereas 1 = admin

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
        ])) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }
}
