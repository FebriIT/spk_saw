<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');

    }

    public function kepsek()
    {
        return view('profile_kepsek');

    }
    public function profile($id)
    {
        $user = Anggota::find($id);
        return view('profile',['user' => $user]);
    }

    public function update(Request $request,$id)
    {
        $user = \App\Anggota::find($id);
        $user->update($request->all());

        return redirect('/profile');
    }

    public function kepsekUpdate(Request $request,$id)
    {
        $user = \App\Anggota::find($id);
        $user->update($request->all());

        return redirect('/profile-kepsek');
    }
}
