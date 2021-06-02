<link href="{{ asset('templatekepsek/css/style.min.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('datatables/css/datatables.bootstrap.csss') }}">
<link rel="stylesheet" href="{{ asset('loginpage/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('datatables/js/buttons/css/buttons.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('loginpage/vendor/bootstrap/css/bootstrap.css') }}">




<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-header">

                <div class="text-center">
                    <img src="{{ asset('admin/assets/img/logo_laporan.png') }}" alt="" class="float-right">
                </div>


                <H2 class="text-center"><b>Daftar Penerima Beasiswa</b></H2>
                <h3 class="text-center"><b>SMP Negeri 14 Kota Jambi</b></h3>
                <h6 class="float-left"><b>*siswa penerima Beasiswa adalah Siswa dengan peringkat paling atas*</b></h6>
                <br>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="data">
            <thead>
                <tr>
                    <th class="text-center">Ranking</th>
                    <th class="text-center">Kode Siswa</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Total Nilai Perhitungan</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach($datas as $key=>$row)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $row->kode }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

</div>


<script src="{{ asset('datatables/js/jquery.min.js') }}"></script>
<script src="{{ asset('datatables/js/buttons/js/buttons.bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script> --}}
<script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables/js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#data').DataTable();
    })
</script>
