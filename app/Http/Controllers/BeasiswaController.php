<?php

namespace App\Http\Controllers;

use \App\Hasil;
use App\PenerimaBeasiswa;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Facades\DataTables;


class BeasiswaController extends Controller
{
    public function index()
    {
        $datas = Hasil::orderBy('total', 'desc')->get();

        return view('laporan_penerima', compact('datas'));
    }

    public function dataBeasiswa()
    {
        return Datatables::of(Hasil::query())->make(true);
    }

    public function tambah()
    {
        return view('kepsek.beasiswa.tambah_beasiswa');
    }

    public function penerima()
    {
        $beasiswa = PenerimaBeasiswa::all();
        return view('beasiswa.index', ['beasiswa' => $beasiswa]);
    }

    public function tambahBeasiswa()
    {
        return view('beasiswa.tambah_beasiswa');
    }

    public function simpan(Request $request)
    {
        $validasi = $this->validate($request, [
            'kode'          => 'unique:penerima_beasiswa',
            'nama'          => 'unique:penerima_beasiswa',
            'total'          => 'required|:penerima_beasiswa',
        ]);
        \App\PenerimaBeasiswa::create($request->all());
        return redirect('/daftar/penerima/beasiswa')->with('message', 'Data berhasil disimpan!');
    }

    public function edit()
    {
    }

    public function update(Request $request, $id)
    {
        $updateData = \App\PenerimaBeasiswa::findOrFail($id);
        $validasi = $this->validate($request, [
            'kode' => 'required|:penerima_beasiswa,kode,' . $id,

        ]);
        $updateData->update($request->all());

        return redirect('/daftar/penerima/beasiswa')->with('message', 'Data Berhasil di Update!');
    }

    public function hapus()
    {
    }

    public function detail($id)
    {
        $detail = \App\Hasil::find($id);
        return response()->json($detail);
    }
}
