@extends('layouts.kepsek')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck mt-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left mt-2">Data User</h3>
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
                        <a href="/kepsek/tambah-data-user" class="btn btn-info btn-sm mr-3 mb-2 float-end text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fas fa-plus" aria-hidden="true"></i> Tambah Data User</a>

                    </div>

                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <form method="POST" action="/kepsek/simpan-data-user">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="role" type="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" value="Admin" readonly>

                                                        @if ($errors->has('role'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('role') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                                        @if ($errors->has('username'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('username') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0 float-end">
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            {{ __('Register') }}
                                                        </button>
                                                 </div>

                                                </div>
                                            </form>
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
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Anggota</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->role }}</td>
                                        <td class="text-center">{{ $user->username }}</td>

                                        <td class="text-center">
                                            <form action="{{route('kepsek.hapus',['id' => $user->id])}}" method="POST">
                                                @csrf
                                                <a href="{{route('kepsek.edit',['id' => $user->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
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
