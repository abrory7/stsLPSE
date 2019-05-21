<?php $title = "Home"; ?>
@extends('layout.base')
@section('content')
  @if(Auth::user()->role == 3)
  <div class="main-header">
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-6">
        <h4>Statistik</h4>
      </div>
      <div class="col-sm-6" style="text-align: right;">
        <a href="{{ url('/tiket/reportstats')}}" class="btn btn-primary">Print</a>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
      <div class="col-sm-12 card" style="height: 146.2px;">
          <h6 style="margin-top: 5px;">Tiket yang Belum Selesai Berdasarkan Tingkat Urgensi</h6>
          <div style="width: 80%">
            <?php $counturg = $urgtotal;
                  $darurat = $arrurg[0] == 0 ? 0 : ($arrurg[0]/$counturg*100);
                  $penting = $arrurg[1] == 0 ? 0 : ($arrurg[1]/$counturg*100);
                  $normal = $arrurg[2] == 0 ? 0 : ($arrurg[2]/$counturg*100);
            ?>
            <p>Darurat: {{$arrurg[0]}}</p>
            <div style="border: 1px solid silver; border-radius: 4px; width: 100%; height: 15px;">
              <div style="background-color: #2196f3; width: {{$darurat}}%; height: 13px;">
              </div>
            </div>
            <p>Penting: {{$arrurg[1]}}</p>
            <div style="border: 1px solid silver; border-radius: 4px; width: 100%; height: 15px;">
              <div style="background-color: #2196f3; width: {{$penting}}%; height: 13px;">
              </div>
            </div>
            <p>Normal: {{$arrurg[2]}}</p>
            <div style="border: 1px solid silver; border-radius: 4px; width: 100%; height: 15px;">
              <div style="background-color: #2196f3; width: {{$normal}}%; height: 13px;">
              </div>
            </div>
          </div>
          <div class="side-box bg-warning">
              <i class="icon-graph"></i>
          </div>
      </div>
  </div>

  <div class="col-sm-3">
      <div class="col-sm-12 card dashboard-product">
          <span>Total Tiket Belum Selesai</span>
          <h2 class="dashboard-total-products counter">{{$totalunfinish}}</h2>
          Tiket
          <div class="side-box bg-warning">
              <i class="icon-direction"></i>
          </div>
      </div>
  </div>

  <div class="col-sm-3">
      <div class="col-sm-12 card dashboard-product">
          <span>Total Tiket Selesai</span>
          <h2 class="dashboard-total-products counter">{{$totalfinish}}</h2>
          Tiket
          <div class="side-box bg-success">
              <i class="icon-direction"></i>
          </div>
      </div>
  </div>

  <div class="col-lg-9 col-md-12">
    <div class="card">
      <div class="card-block">
        <div class="row dashboard-total-income">
          <center>
            <h4>Laporan Tiket Selesai Per Bulan</h4>
          </center>
        </div>
      </div>
      <div class="card-block row">
        <div class="col-sm-12">
          <canvas id="month"></canvas>
        </div>
      </div>
      <center>
        <div class="card-block row">
          <div class="col-sm-12">
            <div class="col-sm-6">
              <div class="btn btn-primary">
                tiket minggu ini <span class="badge">{{$totalweek}}</span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="btn btn-primary">
                tiket tahun ini <span class="badge">{{$totalyear}}</span>
              </div>
            </div>
            &nbsp;
          </div>
        </div>
      </center>
    </div>
  </div>

  <div class="col-lg-3 col-md-6">
    <div class="card" style="height: 424.1px;">
      <h6>
        <center>
          <br>
          Penyelesai Tiket Terbanyak
          <hr style="border: 1px solid black;">
        </center>
      </h6>
      <table class="table">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
        @foreach($solvers as $key => $val)
          <tr>
            <td>{{$val[0]}}</td>
            <td>{{$key}}</td>
            <td>{{count($val)}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-lg-3 col-sm-6">
      <div class="col-sm-12 card dashboard-product">
          <span>Average First Response Time</span>
          <h2 class="dashboard-total-products">{{$avgFirstResponseTime}} Menit</h2>
          Sejak tiket dibuat
      </div>
  </div>

  <div class="col-md-6" style="display: block;">
    <center>
      <div class="card">
        <div class="row card-block">
          <div class="card-body">
            <div id="kategori">
              <h2>Total Aduan Perkategori</h2>
              <center>
              <div style="width: 80%; height: 80%;">
                <canvas id="cat" width="400" height="400"></canvas>
              </div>
            </center>
            </div>
          </div>
        </div>
      </div>
    </center>
  </div>
</div>

@section('AddScript')
<script>
var ctx = document.getElementById('cat').getContext('2d');
var cat = new Chart(ctx, {
    responsive: false,
    type: 'pie',
    data: {
        labels: [<?php foreach($cat as $kategori){ echo '\''.$kategori->kategori->kategori.'\','; } ?>],
        datasets: [
          {
            data: [<?php foreach($countcat as $total){ echo $total.',';} ?>],
            backgroundColor: [
                <?php
                  $bgclr = array("'rgba(255, 0, 0, 0.5)',", "'rgba(0,51,255,0.5)',", "'rgba(255,255,0,0.5)',",
                              "'rgba(51,255,51,0.5)',", "'rgba(255,102,153,0.5)',");
                  for($i = 0; $i < count($countcat); $i++)
                  {
                    echo $bgclr[$i];
                  }
                ?>
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }
      ]
    },
    options:
    {
      legend:
      {
        position: 'right'
      }
    }
  });
</script>
<script>
var ctx = document.getElementById('month').getContext('2d');
var month = new Chart(ctx, {
    maintainAspectRatio: false,
    responsive: true,
    type: 'line',
    data: {
        labels: [ ,<?php foreach($dates as $bulan){ echo '\''.$bulan.'\','; } ?>],
        datasets: [
          {
            label: 'Tiket Selesai',
            data: [0,<?php foreach($monthlyData as $data){ echo $data->count.',';} ?>],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
        }
      ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection

  @else

  
 <div class="row">
     <div class="main-header">
         <h4>Dashboard</h4>
     </div>
 </div>
 <!-- 4-blocks row start -->
 <div class="row m-b-30 dashboard-header">
     <div class="col-lg-3 col-sm-6">
         <div class="col-sm-12 card dashboard-product">
             @if(Auth::user()->role == 1 or Auth::user()->role == 3)
             <span>On Going Ticket</span>
             <h2 class="dashboard-total-products counter">{{ count($allTicket) }}</h2>
             Tiket
             @else
             <span>Tiket Masuk</span>
             <h2 class="dashboard-total-products counter">{{ count($received) }}</h2>
             Tiket
             @endif
             <div class="side-box bg-danger">
                 <i class="icon-direction"></i>
             </div>
         </div>
     </div>
     <div class="col-lg-3 col-sm-6">
         <div class="col-sm-12 card dashboard-product">
             <span>Tiket Selesai Minggu Ini</span>
             <h2 class="dashboard-total-products counter">{{ count($weekly) }}</h2>
             Tiket
             <div class="side-box bg-info">
                 <i class="icon-graph"></i>
             </div>
         </div>
     </div>
     <div class="col-lg-3 col-sm-6">
         <div class="col-sm-12 card dashboard-product">
             <span>Tiket Selesai Bulan Ini</span>
             <h2 class="dashboard-total-products counter">{{ count($monthly) }}</h2>
             Tiket
             <div class="side-box bg-primary">
                 <i class="icon-graph"></i>
             </div>
         </div>
     </div>

     <div class="col-lg-3 col-sm-6">
         <div class="col-sm-12 card dashboard-product">
             <span>Tiket Selesai Tahun Ini</span>
             <h2 class="dashboard-total-products counter">{{ count($yearly) }}</h2>
             Tiket
             <div class="side-box bg-success">
                 <i class="icon-graph"></i>
             </div>
         </div>
     </div>
  </div>
         <!-- 4-blocks row end -->
         <!-- 1-3-block row start -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
        	<div class="row">
        			<h4>Tiket Terbaru</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      No. Tiket
                    </th>
                    <th>
                      Urgensi
                    </th>
                    <th>
                      Judul Laporan
                    </th>
                    <th>
                      Limit Penyelesaian
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($recent as $tiketbaru)
                  <tr>
                  @if($tiketbaru->assignedTicket->finish == 0)
                    <td>
                      <a href="{{ url('/tiket/received/diskusi/'.$tiketbaru->assignedTicket->id) }}">
                        <b><u>{{ $tiketbaru->assignedTicket->nomor_ticket }}</u></b>
                      </a>
                    </td>
                    @if($tiketbaru->assignedTicket->urgensi == "Darurat")
                      <td class="bg-danger">{{$tiketbaru->assignedTicket->urgensi}}</td>
                    @elseif($tiketbaru->assignedTicket->urgensi == "Penting")
                      <td class="bg-warning">{{$tiketbaru->assignedTicket->urgensi}}</td>
                    @elseif($tiketbaru->assignedTicket->urgensi == "Normal")
                      <td>{{$tiketbaru->assignedTicket->urgensi}}</td>
                    @endif
                    <td>
                      {{ $tiketbaru->assignedTicket->aduan->subjek }}
                    </td>
                    <td>
                      {{ $tiketbaru->assignedTicket->expire}}
                    </td>
                  @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
        	</div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
        	<div class="row">
        			<h4>Tiket Darurat Yang Tersedia</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      No. Tiket
                    </th>
                    <th>
                      Judul Laporan
                    </th>
                    <th>
                      Perusahaan
                    </th>
                    <th>
                      Limit Penyelesaian
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($darurat as $tiket)
                  <tr>
                    <td class="bg-danger">
                      <a href="{{ url('/tiket/received/diskusi/'.$tiket->id) }}">
                        <b><u>{{ $tiket->nomor_ticket }}</u></b>
                      </a>
                    </td>
                    <td>
                      {{ $tiket->aduan->subjek}}
                    </td>
                    <td>
                      {{ $tiket->aduan->perusahaan }}
                    </td>
                    <td>
                      {{ $tiket->expire}}
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
<!-- 2-1 block end -->
@section('AddScript')
<script type="text/javascript">
    function actnav() {
      var element = document.getElementById("home");
      element.classList.add("active");
    }
</script>
@stop

@endif
@stop

