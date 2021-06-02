@extends('layouts.kepsek')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck mt-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left mt-2">Tabel Hasil Normalisasi dan Tabel Ranking</h3>
                        <a href="/kepsek/hasil-analisa" class="btn btn-primary btn-sm mr-3 mb-2 float-end text-white"><i class="fas fa-eye" aria-hidden="true"></i> Tabel Hasil Analisa</a>

                    </div>

                </div>
            </div>

            <div class="col-md-12 card-deck mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Tabel Hasil Normalisasi</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode</th>
                                        <?php $bobot = [] ?>
                                        @foreach($kriteria as $krit)
                                        <?php $bobot[$krit->id] = $krit->bobot ?>
                                        <th class="text-center">{{$krit->kode}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($alternatif))
                                    <?php $rangking = []; ?>
                                    @foreach($alternatif as $data)
                                    <tr>
                                        <td class="text-center">{{$data->kode_alternatif}}</td>
                                        <?php $total = 0;?>
                                        @foreach($data->crip as $crip)
                                        @if($crip->kriteria->atribut == 'cost')
                                        <?php $normalisasi = ($kode_krit[$crip->kriteria->id]/$crip->nilai_crip); ?>
                                        @elseif($crip->kriteria->atribut == 'benefit')
                                        <?php $normalisasi = ($crip->nilai_crip/$kode_krit[$crip->kriteria->id]); ?>
                                        @endif
                                        <?php $total = $total+($bobot[$crip->kriteria->id]*$normalisasi);?>
                                        <td class="text-center">{{$normalisasi}}</td>
                                        @endforeach
                                        <?php $rangking[] = [
                                                    'kode'  => $data->kode_alternatif,
                                                    'nama'  => $data->nama_alternatif,
                                                    'total' => $total
                                                ]; ?>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 card-deck mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Tabel Hasil Perankingan</h3>
                        <a href="/cetak-laporan" class="btn btn-primary btn-sm mr-3 mb-2 float-end text-white"><i class="fas fa-print" aria-hidden="true"></i> Cetak</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    usort($rangking, function($a, $b)
                                    {
                                        return $a['total']<=>$b['total'];
                                    });
                                    rsort($rangking);
                                    $a = 1;
                                    ?>

                                    @foreach($rangking as $t)
                                    @php

                                    // $hasil->delete();
                                    $data=new App\Hasil;
                                    $data->kode=$t['kode'];
                                    $data->nama=$t['nama'];
                                    $data->total=$t['total'];
                                    $data->save();
                                    $hasil = App\Hasil::orderBy('total', 'desc')->get();

                                    @endphp




                                    @endforeach
                                    @foreach ($hasil as $key=>$data)
                                    <tr>
                                        <td class="text-center">{{$data->kode}}</td>
                                        <td class="text-center">{{$data->nama}}</td>
                                        <td class="text-center">{{$data->total}}</td>
                                        <td class="text-center">{{ ++$key }}</td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
