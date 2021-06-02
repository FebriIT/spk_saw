@extends('layouts.masters')

@section('content')
<div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-12 card-deck mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Tabel Hasil Analisa</h3>
                        <a href="{{route('normalisasi')}}" class="btn btn-info btn-sm mr-3 mt-2 float-end text-white"> <i class="fa fa-table"></i> Tabel Normalisasi dan Ranking</a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        @foreach($kriteria as $krit)
                                        <th class="text-center">{{$krit->nama}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($alternatif))
                                    @foreach($alternatif as $data)
                                    <tr>
                                        <td>{{$data->nama_alternatif}}</td>
                                        @foreach($data->crip as $crip)
                                        <td>{{$crip->nama_crip}}</td>
                                        @endforeach
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

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode</th>
                                        @foreach($kriteria as $krit)
                                        <th class="text-center">{{$krit->kode}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($alternatif))
                                    @foreach($alternatif as $data)
                                    <tr>
                                        <td>{{$data->kode_alternatif}}</td>
                                        @foreach($data->crip as $crip)
                                        <td>{{$crip->nilai_crip}}</td>
                                        @endforeach
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
        </div>

</div>

@endsection
