<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Hasil;

class LaporanController extends Controller
{
    public function laporan()
    {
        $datas = Hasil::all();

        return view('laporan', [
            'datas'      => $datas,

        ]);


    }
}
