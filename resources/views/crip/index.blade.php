@extends('layouts.masters')

@section('content')
<div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Data Nilai Crips</h2>
                        <form action="{{route('crip')}}" class="form-inline float-right" method="GET">
                        <div class="form-group">
                            <select name="k" onchange="this.form.submit()" class="form-control">
                                <option value="">-- Pilih Kriteria --</option>
                                @foreach($kriteria as $k)
                                    <option value="{{$k->id}}" {{(request('k') == $k->id)?'selected':''}}>{{$k->kode." - ".$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>
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
                            <a href="{{route('crip.tambah')}}" class="btn btn-info btn-sm ml-2 text-white float-end" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        </form>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Nilai Crips</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <form action="{{route('crip.simpan')}}" method="POST" class="col-md-12">
                                            @csrf
                                            <div class="form-group">
                                                <label for="kriteria">Kriteria <span class="text-danger">*</span></label>
                                                <select name="kriteria" class="form-control">
                                                    <option value="">-- Pilih Kriteria --</option>
                                                    @foreach($kriteria as $k)
                                                        <option value="{{$k->id}}">{{$k->kode." - ".$k->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_crip">Nama <span class="text-danger">*</span></label>
                                                <input type="text" name="nama_crip" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="nilai_crip">Nilai <span class="text-danger">*</span></label>
                                                <input type="text" name="nilai_crip" class="form-control">
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

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Kriteria</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center" style="width:15%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($crips->isEmpty() || empty($crips))
                                    <tr>
                                        <td colspan="4" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @else
                                    @foreach($crips as $data)
                                        <tr>
                                            <td class="text-center">{{$data->kriteria->nama}}</td>
                                            <td class="text-center">{{$data->nama_crip}}</td>
                                            <td class="text-center">{{$data->nilai_crip}}</td>
                                            <td class="text-center">
                                                <form action="{{route('crip.hapus',['id' => $data->id])}}" method="POST">
                                                    @csrf
                                                    <a href="{{route('crip.edit',['id' => $data->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
