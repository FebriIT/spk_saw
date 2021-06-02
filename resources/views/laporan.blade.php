<link href="{{ asset('templatekepsek/css/style.min.css') }}" rel="stylesheet">
<div class="container">
    <div class="page-header">

        <div class="text-center">
            <img src="{{ asset('admin/assets/img/logo_laporan.png') }}" alt="" class="float-right">
          </div>


          <H2 class="text-center"><b>SPK Beasiswa</b></H2>
          <h3 class="text-center"><b>SMP Negeri 14 Kota Jambi</b></h3>

          <input id="printpagebutton" type="button" value="Print this page" onclick="printpage()"/>

          <script type="text/javascript">
              function printpage() {
                  //Get the print button and put it into a variable
                  var printButton = document.getElementById("printpagebutton");
                  //Set the print button visibility to 'hidden'
                  printButton.style.visibility = 'hidden';
                  //Print the page content
                  window.print()
                  //Set the print button to 'visible' again
                  //[Delete this line if you want it to stay hidden after printing]
                  printButton.style.visibility = 'visible';
              }
          </script>

        <input id="backbutton" type="button" value="Kembali" onclick="backbutton()"/>

        <script type="text/javascript">
            function backbutton() {
                //Get the print button and put it into a variable
                var printButton = document.getElementById("backbutton");
                //Set the print button visibility to 'hidden'
                printButton.style.visibility = 'hidden';
                //Print the page content
                window.history.back();
                //Set the print button to 'visible' again
                //[Delete this line if you want it to stay hidden after printing]
                printButton.style.visibility = 'visible';
            }
        </script>





    </div>
    <div class="row py-2">
        <table class="table table-bordered table-hover bg-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Siswa</th>
                    <th>Nama</th>
                    <th>Total</th>
                    <th>Ranking</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $t)
                @php

                $datas = App\Hasil::orderBy('total', 'desc')->get();

                @endphp

                @endforeach

                @foreach($datas as $key=>$d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->kode }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->total }}</td>
                    <td>{{ ++$key }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
