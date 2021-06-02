@extends('layouts.masters')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Hasil Analisa</h3>
                        <a href="{{route('ranking')}}" class="btn btn-success btn-sm mr-3 mt-2 float-right">Tabel Ranking</a>
                        <a href="{{route('normalisasi')}}" class="btn btn-info btn-sm mr-3 mt-2 float-right">Tabel Normalisasi</a>

                    </div>

                </div>
            </div>

            <div class="col-md-12 card-deck mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Normalisasi</h3>
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
                                        <td>{{$data->kode_alternatif}}</td>
                                        <?php $total = 0;?>
                                        @foreach($data->crip as $crip)
                                        @if($crip->kriteria->atribut == 'cost')
                                        <?php $normalisasi = ($kode_krit[$crip->kriteria->id]/$crip->nilai_crip); ?>
                                        @elseif($crip->kriteria->atribut == 'benefit')
                                        <?php $normalisasi = ($crip->nilai_crip/$kode_krit[$crip->kriteria->id]); ?>
                                        @endif
                                        <?php $total = $total+($bobot[$crip->kriteria->id]*$normalisasi);?>
                                        <td>{{$normalisasi}}</td>
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
                        <h3>Ranking</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Total</th>
                                        <th>Ranking</th>
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
                                        <td>{{$data->kode}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->total}}</td>
                                        <td>{{ ++$key }}</td>

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
