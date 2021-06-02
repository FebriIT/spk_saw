@extends('layouts.masters')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left ml-1">Data Alternatif</h2>
                        {{--<form action="" class="form-inline float-right">--}}
                        {{--<div class="form-group">--}}
                        {{--<input type="text" name="q" placeholder="Carilah sesuatu" class="form-control" value="{{request('q')?request('q'):''}}">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<button type="refresh" class="btn btn-danger">Refresh</button>--}}
                        {{--</div>--}}
                        <div class="float-right">
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
                            <a href="{{route('alternatif.tambah')}}" class="btn btn-info btn-sm mt-2 mr-1 float-end text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alternatif</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
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
                                            <div class="float-end">
                                                <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        {{--</form>--}}
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center" width="10%">Kode</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($alternatif))
                                    @foreach($alternatif as $data)
                                        <tr>
                                            <td class="text-center">{{$data->kode_alternatif}}</td>
                                            <td class="text-center">{{$data->nama_alternatif}}</td>
                                            <td class="text-center">{{$data->keterangan}}</td>
                                            <td class="text-center">
                                                <form action="{{route('alternatif.hapus',['id' => $data->id])}}" method="POST">
                                                    @csrf
                                                    <a href="{{route('nilai')."?a=".$data->id}}" class="btn btn-sm btn-info">Crip</a>
                                                    <a href="{{route('alternatif.edit',['id' => $data->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
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
