<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GantiPasswordController extends Controller
{
    public function password()
    {
        return view('ganti_pw');
    }

    public function update(Request $request){


        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect('/ganti-password')->with('error','Password Lama tidak Sesuai');
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect('/ganti-password')->with('error','Password Baru tidak boleh sama dengan Password lama');
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:4|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect('/ganti-password')->with('message','Sukses Mengganti Password!');

    }

    public function passwordKepsek()
    {
        return view('ganti_pw_kepsek');
    }

    public function updateKepsek(Request $request){


        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect('/ganti-password')->with('error','Password Lama tidak Sesuai');
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect('/ganti-password')->with('error','Password Baru tidak boleh sama dengan Password lama');
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:4|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect('/ganti-password/kepsek')->with('message','Sukses Mengganti Password!');

    }
}
