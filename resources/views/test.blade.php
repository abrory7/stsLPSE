<?php $title = "Test page"; ?>
@extends('layout.base')
@section('content')
<div class="main-header">
    <h4>Statistik</h4>
</div>
<div class="row">
  <div class="col-lg-9 col-md-12">
    <div class="card">
      <div class="card-block">
        <div class="row m-b-10 dashboard-total-income">
          <div class="col-sm-6 text-left">
            <div class="counter-txt">
              <h6>Total Income</h6>
            </div>
          </div>
          <div class="col-sm-6">
            <i class="icofont icofont-link-alt"></i>
          </div>
        </div>
      </div>
      <div class="card-block row">
        <div class="col-sm-12">
          <canvas id="chartVersus"></canvas>
        </div>
      </div>
      <div class="card-block">
        <div class="row">
          <div class="col-sm-3 col-xs-6 income-per-day">
            <p>Today</p>
              $
            <h6 class="counter">6734.00</h6>
          </div>
          <div class="col-sm-3 col-xs-6 income-per-day">
            <p>Last Week</p>
              $
            <h6 class="counter">58789.00</h6>
          </div>
          <div class="col-sm-3 col-xs-6 income-per-day">
            <p>Total Orders</p>
              $
            <h6 class="counter">658</h6>
          </div>
          <div class="col-sm-3 col-xs-6 income-per-day">
            <p>Total Income</p>
              $
            <h6 class="counter">$85749.00</h6>
          </div>
        </div>
      </div>
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
          <span>Total Tiket Selesai</span>
          <h2 class="dashboard-total-products counter">{{$totalfinish}}</h2>
          Tiket
          <div class="side-box bg-danger">
              <i class="icon-direction"></i>
          </div>
      </div>
  </div>
  <div class="col-lg-3 col-sm-6">
      <div class="col-sm-12 card dashboard-product">
          <span>Average First Response Time</span>
          <h2 class="dashboard-total-products">{{$avgFirstResponseTime}} Menit</h2>
          Sejak tiket dibuat
      </div>
  </div>
  <div class="col-lg-6 col-sm-9">
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
          <div class="side-box bg-primary">
              <i class="icon-graph"></i>
          </div>
      </div>
  </div>

  <div class="col-md-6">
    <div class="card">
      <div class="card-block">
        <div class="card-body">
          <div id="kategori">
            <h2>Total Laporan Perkategori</h2>
            <center>
            <div style="width: 80%; height: 80%;">
              <canvas id="cat" width="400" height="400"></canvas>
            </div>
          </center>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-block">
        <div class="card-body">
          <div id="bulan">
            <h2>Total Laporan Perbulan</h2>
            <div style="width: 40%; height: 40%;">
              <canvas id="month" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('AddScript')
<script>
var ctx = document.getElementById('cat').getContext('2d');
var cat = new Chart(ctx, {
    responsive: false,
    type: 'doughnut',
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
        labels: [<?php foreach($dates as $bulan){ echo '\''.$bulan.'\','; } ?>],
        datasets: [
          {
            data: [<?php foreach($monthlyData as $data){ echo $data->count.',';} ?>],
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

// Chart versus

var ctxVersus = document.getElementById('chartVersus');
var versusLine = new Chart(ctxVersus, {
  type: 'line',
  data: ['0.2', '0.4', '0.5'],
})
</script>
@endsection
