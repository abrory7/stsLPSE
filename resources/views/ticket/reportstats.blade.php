<?php
  use Carbon\Carbon;
  $tahun = Carbon::now();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      Laporan STS LPSE
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('res/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('res/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/icon/icofont/css/icofont.css') }}">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/icon/simple-line-icons/css/simple-line-icons.css') }}">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Echart js -->
    <script src="{{ asset('res/assets/plugins/charts/echarts/js/echarts-all.js') }}"></script>

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/main.css') }}">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/responsive.css') }}">
    <!--color css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/color/color-1.min.css') }}" id="color"/>
    <style>
      @page {
        size: A4;
        margin: 0;
      }
      @media print {
        html, body {
          width: 210mm;
          height: 297mm;
        }
      }
    </style>
  </head>
  <body>
    <center><h1>Statistik Support Ticketing System LPSE Tahun {{ $tahun->year }}</h1></center>
    <hr>
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <h4 align="center">Persentase Total Laporan Berdasarkan Tingkat Urgensi</h4>
          <hr>
        </div>
        <div class="card-block">
          <div class="row">
            <div class="col-md-6">
              <h6>1. Tiket Belum Selesai</h6>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jenis Urgensi Tiket</th>
                    <th>Total</th>
                    <th>Persentase</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counturg = $urgtotal;
                        $darurat = $arrurg[0] == 0 ? 0 : ($arrurg[0]/$counturg*100);
                        $penting = $arrurg[1] == 0 ? 0 : ($arrurg[1]/$counturg*100);
                        $normal = $arrurg[2] == 0 ? 0 : ($arrurg[2]/$counturg*100);
                  ?>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Darurat
                    </td>
                    <td>
                      {{ $arrurg[0] }}
                    </td>
                    <td>
                      {{ $darurat }}%
                    </td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      Penting
                    </td>
                    <td>
                      {{ $arrurg[1] }}
                    </td>
                    <td>
                      {{ $penting }}%
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      Normal
                    </td>
                    <td>
                      {{ $arrurg[2] }}
                    </td>
                    <td>
                      {{ $normal }}%
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right">
                      Total Tiket
                    </td>
                    <td>
                      {{ $urgtotal }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6">
              <div id="chart" style="margin-left: 25%"></div>
            </div>
          </div>
          <div class="col-md-6">
            <h6>2. Tiket Selesai</h6>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Jenis Urgensi Tiket</th>
                  <th>Total</th>
                  <th>Persentase</th>
                </tr>
              </thead>
              <tbody>
                <?php $counturgfinish = $urgfinish;
                      $darurat2 = $arrurgfinish[0] == 0 ? 0 : ($arrurgfinish[0]/$counturgfinish*100);
                      $penting2 = $arrurgfinish[1] == 0 ? 0 : ($arrurgfinish[1]/$counturgfinish*100);
                      $normal2 = $arrurgfinish[2] == 0 ? 0 : ($arrurgfinish[2]/$counturgfinish*100);
                ?>
                <tr>
                  <td>
                    1
                  </td>
                  <td>
                    Darurat
                  </td>
                  <td>
                    {{ $arrurgfinish[0] }}
                  </td>
                  <td>
                    {{ $darurat2 }}%
                  </td>
                </tr>
                <tr>
                  <td>
                    2
                  </td>
                  <td>
                    Penting
                  </td>
                  <td>
                    {{ $arrurgfinish[1] }}
                  </td>
                  <td>
                    {{ $penting2 }}%
                  </td>
                </tr>
                <tr>
                  <td>
                    3
                  </td>
                  <td>
                    Normal
                  </td>
                  <td>
                    {{ $arrurgfinish[2] }}
                  </td>
                  <td>
                    {{ $normal2 }}%
                  </td>
                </tr>
                <tr>
                  <td colspan="2" align="right">
                    Total Tiket
                  </td>
                  <td>
                    {{ $urgfinish }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <div id="chart2" style="margin-left: 25%"></div>
          </div>
        </div>
        <hr>
      </div>
      <div class="card">
        <div class="row">
          <div class="card-block">
            <center><h4>Tiket Selesai</h4></center>
            <hr>
          </div>
          <div class="card-block">
            <div class="col-md-6">
              <center><div id="chart3"></div></center>
            </div>
            <h6>Penyelesai Tiket Terbanyak:</h6>
            <div class="col-md-6">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tiket Terselesaikan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $x = 1; ?>
                  @foreach($solvers as $key => $val)
                  <tr>
                    <td>{{ $x++ }}</td>
                    <td>{{ $val[0] }}</td>
                    <td>{{ $key }}</td>
                    <td>{{ count($val)}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <h6>Waktu Rata-Rata Untuk Merespon Sebuah Tiket:</h6>
              <div class="btn btn-xlg btn-primary">{{$avgFirstResponseTime}} Menit</div>
            </div>
            <hr>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="row">
          <div class="card-block">
            <center><h4>Persentase Total Laporan Masuk Berdasarkan Kategori</h4></center>
            <hr>
          </div>
          <div class="card-block">
            <div class="col-md-6">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kategori Aduan</th>
                    <th>Total</th>
                    <th>Persentase</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($kategori as $key => $cat)
                  <tr>
                    <td>
                      {{ $key+1 }}
                    </td>
                    <td>
                      {{ $cat->kategori->kategori }}
                    </td>
                    <td>
                      {{ $cat->count }}
                    </td>
                    <td>
                      {{ number_format((float)$cat->count/$kategorisum*100, 1, ',', '') }}%
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="col-md-6">
              <div id="chart4" style="margin-left: 25%"></div>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </body>
  <script src="{{ asset('res/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('res/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('res/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
  var options = {
        chart: {
            width: 315,
            height: 270,
            type: 'pie',
        },
        labels: ['Darurat', 'Penting', 'Normal'],
        series: [{{$arrurg[0]}}, {{$arrurg[1]}}, {{$arrurg[2]}}],
        colors: ['#FF0000', '#FFBF00', '#00BFFF'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 309
                },
                legend: {
                    position: 'right'
                }
            }
        }]
    }

    var chart = new ApexCharts(
        document.querySelector("#chart"),
        options
    );

    chart.render();
  </script>
  <script>
  var options = {
        chart: {
            width: 315,
            height: 270,
            type: 'pie',
        },
        labels: ['Darurat', 'Penting', 'Normal'],
        series: [{{$arrurgfinish[0]}}, {{$arrurgfinish[1]}}, {{$arrurgfinish[2]}}],
        colors: ['#FF0000', '#FFBF00', '#00BFFF'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 309
                },
                legend: {
                    position: 'right'
                }
            }
        }]
    }

    var chart = new ApexCharts(
        document.querySelector("#chart2"),
        options
    );

    chart.render();
  </script>
  <script>
  var options = {
    chart: {
      width: 500,
      height: 400,
      type: 'line'
    },
    series: [{
      name: 'Tiket Selesai',
      data: [<?php foreach($monthlyData as $bulantotal){ echo $bulantotal->count.','; } ?>]
    }],
    xaxis: {
      categories: [<?php foreach($dates as $month){ echo "'".$month."',"; } ?>]
    },
    responsive: [{
        breakpoint: 560,
        options: {
            chart: {
                width: 400,
                height: 300
            },
        }
    }]
  }

  var chart = new ApexCharts(document.querySelector("#chart3"), options);

  chart.render();
  </script>
  <script>
  var options = {
        chart: {
            width: 315,
            height: 270,
            type: 'pie',
        },
        labels: [<?php foreach($kategori as $cat){ echo "'".$cat->kategori->kategori."',";} ?>],
        series: [<?php foreach($kategori as $cat){ echo $cat->count.',';} ?>],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 309
                },
                legend: {
                    position: 'right'
                }
            }
        }]
    }

    var chart = new ApexCharts(
        document.querySelector("#chart4"),
        options
    );

    chart.render();
  </script>
</html>
