@extends('layouts.masters')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Data Nilai Alternatif</h2>
                        <div class="float-right">

                        </div>

                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- konten modal-->
                                <div class="modal-content">
                                    <!-- heading modal -->
                                    <div class="modal-header">
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
                                        <h4 class="modal-title">Tambah Data Alternatif</h4>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <form action="{{route('alternatif.simpan')}}" method="POST" class="col-md-12">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="kode">Kode <span class="text-danger">*</span></label>
                                                    <input type="text" name="kode_alternatif" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_alternatif" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan">Kelas <span class="text-danger">*</span></label>
                                                    <textarea name="keterangan" class="form-control"></textarea>
                                                </div>
                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- footer modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama</th>
                                    @foreach($kriteria as $krit)
                                        <th class="text-center">{{$krit->nama}}</th>
                                    @endforeach
                                    <th class="text-center" style="width:10%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($alternatif))
                                    @foreach($alternatif as $data)
                                        <tr>
                                            <td>{{$data->kode_alternatif}}</td>
                                            <td>{{$data->nama_alternatif}}</td>
                                            @foreach($data->crip as $crip)
                                                <td>{{$crip->nama_crip}}</td>
                                            @endforeach
                                            <td class="text-center">
                                                <form action="{{route('nilai.hapus',['id' => $data->id])}}" method="POST">
                                                    @csrf
                                                    <a href="{{route('nilai.edit',['id' => $data->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>

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
