<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Anggota;
use App\Kriteria;
use App\Hasil;
use DB;
use PDF;


use Illuminate\Http\Request;

class KepsekController extends Controller
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

        $hitungSiswa = Anggota::count();
        $hitungAlternatif = Alternatif::count();
        $hitungKriteria = Kriteria::count();

        //        return json_encode($kode_krit);
        return view('kepsek.index', [
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif,
            'kode_krit'     => $kode_krit,
            'hitungSiswa' => $hitungSiswa,
            'hitungAlternatif' => $hitungAlternatif,
            'hitungKriteria' => $hitungKriteria

        ]);
    }

    public function analisa()
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
        return view('kepsek.analisa', [
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
        return view('kepsek.ranking', [
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
        return view('kepsek.normalisasi', [
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif,
            'kode_krit'     => $kode_krit,

        ]);
    }

    public function user()
    {
        $user = \App\User::all();

        return view ('kepsek.user')-> with ('users', $user);
    }

    public function tambah(Request $request)
    {
            return view('auth.register_kepsek');
    }

    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,[
            'username'          => 'required|:users',

            ]);

        \App\Anggota::create(request(['name','role', 'username', 'password']));
        return redirect('/kepsek/data-user')->with('message','Sukses Menyimpan Data!');


    }

    public function edit($id)
    {
        $data['user']     = \App\User::findOrFail($id);
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('KepsekController@update', $id);
        return view('kepsek/edit_user',$data);
    }

    public function update(Request $request,$id)
    {
        $updateUser = Anggota::where('id',$id)
                ->update($request->except(['_token']));
        if (!$updateUser) {
            return back();
        }
        return redirect('/kepsek/data-user')->with('message','Sukses Mengupdate Data!');
    }

    public function hapus($id)
    {
        $anggota = \App\Anggota::find($id);
        $anggota->delete();

        return redirect('/kepsek/data-user')->with('message', 'Data berhasil di Hapus!');
    }

    public function laporan()
    {
        $datas = Hasil::all();

        return view('laporan', [
            'datas'      => $datas,

        ]);


    }
}
