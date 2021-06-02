@extends('layouts.kepsek')

@section('content')
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Tabel Hasil Analisa</h3>
                        <a href="{{route('kepsek.ranking')}}" class="btn btn-info btn-sm mr-3 mt-2 float-end text-white">Tabel Normalisasi dan Ranking</a>

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
</div>

@endsection
