@extends('layouts.kepsek')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">Edit Data User</div>
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
                <div class="card-body">
                    <form action="{{route('kepsek.update',['id' => Request::segment(3)])}}" method="POST" class="col-md-12">

                        @csrf

                        <div class="form-group">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="role">Status <span class="text-danger">*</span></label>
                                <select name="role" class="form-control">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Kepsek">Kepsek</option>
                                </select>
                         </div>

                        <div class="form-group">
                            <label for="username">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" value="{{$user->username}}" readonly>
                        </div>


                        <div class="float-right">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
