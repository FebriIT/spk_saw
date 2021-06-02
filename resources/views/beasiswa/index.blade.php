@extends('layouts.masters')

@section('content')

<div class="container-fluid">




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left ml-1">Daftar Penerima Beasiswa</h2>
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
                            <a href="{{route('tambah.penerima.beasiswa')}}" class="btn btn-info btn-sm mr-3 fa fa-plus-square text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"> Tambah Data</a>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penerima Beasiswa</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

                                        <script>
                                            //ini buku ke 1
                                            $(document).ready(function(){
                                            $("#kode").change(function(event) {
                                                var kode = $("#kode").val();
                                                $.get('{{ url('/data/penerima-beasiswa/detail') }}/'+kode, function(data) {
                                                    $("#nama").val(data.nama);
                                                    $("#total").val(data.total);
                                                });
                                            });
                                        })
                                        </script>
                                    <div class="row">
                                        <form action="{{route('simpan.penerima.beasiswa',$beasiswa)}}" method="POST" class="col-md-12">
                                            @csrf
                                            <div class="form-group">
                                                {{ Form::label('kode', 'Kode ') }}
                                                {!! Form::select('kode', \App\Hasil::pluck('kode','id'), null, ['class' => 'form-control']) !!}
                                                <span class="text-danger">{{ $errors->first('kode') }}</span>
                                              </div>
                                            <div class="form-group">
                                                <label for="nama">Nama<span class="text-danger">*</span></label>
                                                <input type="text" name="nama" class="form-control" id="nama" required autocomplete="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="total">Total Nilai <span class="text-danger">*</span></label>
                                                <input type="text" name="total" class="form-control" id="total" required autocomplete="total">
                                            </div>
                                            <div class="float-end">
                                                <button type="submit" class="btn btn-success btn-sm text-white">Simpan</button>
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
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center" style="width: 20%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($beasiswa))
                                    @foreach($beasiswa as $data)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td class="text-center">{{$data->kode}}</td>
                                            <td class="text-center">{{$data->nama}}</td>
                                            <td class="text-center">{{$data->total}}</td>
                                            <td class="text-center">
                                                <form action="{{route('hapus.penerima.beasiswa',['id' => $data->id])}}" method="POST">
                                                    @csrf
                                                    <a href="{{route('edit.penerima.beasiswa',['id' => $data->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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
