<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('new-auth/login');
    }

    public function logout ()
    {
        Auth::logout();

        return redirect('/home');

    }

    public function postlogin(Request $request)
    {
        if(\Auth::attempt(['username' => $request->email,
        'password' => $request->password, 'role' => 'Admin'])){

            return redirect('/home');
        }

        if(\Auth::attempt(['username' => $request->email,
        'password' => $request->password, 'role' => 'Kepsek'])){

            return redirect('/kepsek');
        }

        return redirect('/login')->with('pesan','Username atau Password salah!');
    }

}
