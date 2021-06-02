<?php

namespace App\Http\Controllers;

Use \App\Anggota;
Use \App\Kriteria;
Use \App\Alternatif;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hitungSiswa = Anggota::count();
        $hitungAlternatif = Alternatif::count();
        $hitungKriteria = Kriteria::count();

        return view('home', [
            'hitungSiswa' => $hitungSiswa,
            'hitungAlternatif' => $hitungAlternatif,
            'hitungKriteria' => $hitungKriteria

        ]);
    }
}
