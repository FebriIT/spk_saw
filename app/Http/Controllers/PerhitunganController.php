<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use App\Hasil;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $kode_krit = [];
        foreach ($kriteria as $krit) {
            $kode_krit[$krit->id] = [];
            foreach ($alternatif as $al) {
                foreach ($al->crip as $crip) {
                    if ($crip->kriteria->id == $krit->id) {
                        $kode_krit[$krit->id][] = $crip->nilai_crip;
                    }
                }
            }

            if ($krit->atribut == 'cost') {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->atribut == 'benefit') {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        };

        // $hasil = Hasil::delete();
        Hasil::truncate();
        $hasil = Hasil::orderBy('total', 'desc')->get();

        //        return json_encode($kode_krit);
        return view('perhitungan.index', [
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif,
            'kode_krit'     => $kode_krit,

        ]);
    }

    public function ranking()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $kode_krit = [];
        foreach ($kriteria as $krit) {
            $kode_krit[$krit->id] = [];
            foreach ($alternatif as $al) {
                foreach ($al->crip as $crip) {
                    if ($crip->kriteria->id == $krit->id) {
                        $kode_krit[$krit->id][] = $crip->nilai_crip;
                    }
                }
            }

            if ($krit->atribut == 'cost') {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->atribut == 'benefit') {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        };

        // $hasil = Hasil::delete();
        Hasil::truncate();
        $hasil = Hasil::orderBy('total', 'desc')->get();

        //        return json_encode($kode_krit);
        return view('perhitungan.ranking', [
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif,
            'kode_krit'     => $kode_krit,

        ]);
    }

    public function normalisasi()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $kode_krit = [];
        foreach ($kriteria as $krit) {
            $kode_krit[$krit->id] = [];
            foreach ($alternatif as $al) {
                foreach ($al->crip as $crip) {
                    if ($crip->kriteria->id == $krit->id) {
                        $kode_krit[$krit->id][] = $crip->nilai_crip;
                    }
                }
            }

            if ($krit->atribut == 'cost') {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->atribut == 'benefit') {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        };

        // $hasil = Hasil::delete();
        Hasil::truncate();
        $hasil = Hasil::orderBy('total', 'desc')->get();

        //        return json_encode($kode_krit);
        return view('perhitungan.normalisasi', [
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif,
            'kode_krit'     => $kode_krit,

        ]);
    }
}
