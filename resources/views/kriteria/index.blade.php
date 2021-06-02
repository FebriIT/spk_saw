@extends('layouts.masters')

@section('content')


<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left ml-1">Data Kriteria</h2>
                        {{--<form action="" class="form-inline float-right">--}}
                        {{--<div class="form-group">--}}
                        {{--<input type="text" name="q" placeholder="Carilah sesuatu" class="form-control" value="{{request('q')?request('q'):''}}">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<button type="refresh" class="btn btn-danger">Refresh</button>--}}
                        {{--</div>--}}
                        <div class="float-end">
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
                            <a href="{{route('kriteria.tambah')}}" class="btn btn-info btn-sm mr-3 fa fa-plus-square text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"> Tambah Data</a>
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
                                        <form action="{{route('kriteria.simpan')}}" method="POST" class="col-md-12">
                                            @csrf
                                            <div class="form-group">
                                                <label for="kode">Kode <span class="text-danger">*</span></label>
                                                <input type="text" name="kode" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama Kriteria <span class="text-danger">*</span></label>
                                                <input type="text" name="nama" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="atribut">Atribut <span class="text-danger">*</span></label>
                                                <select name="atribut" class="form-control">
                                                    <option value="">-- Pilih Atribut --</option>
                                                    <option value="cost">Cost</option>
                                                    <option value="benefit">Benefit</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="bobot">Bobot <span class="text-danger">*</span></label>
                                                <input type="text" name="bobot" class="form-control">
                                            </div>
                                            <div class="float-end">
                                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
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
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Kriteria</th>
                                    <th class="text-center">Atribut</th>
                                    <th class="text-center">Bobot</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($kriteria))
                                    @foreach($kriteria as $data)
                                        <tr>
                                            <td class="text-center">{{$data->kode}}</td>
                                            <td class="text-center">{{$data->nama}}</td>
                                            <td class="text-center">{{$data->atribut}}</td>
                                            <td class="text-center">{{$data->bobot}}</td>
                                            <td class="text-center">
                                                <form action="{{route('kriteria.hapus',['id' => $data->id])}}" method="POST">
                                                    @csrf
                                                    <a href="{{route('crip')."?k=".$data->id}}" class="btn btn-sm btn-info">Crip</a>
                                                    <a href="{{route('kriteria.edit',['id' => $data->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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
