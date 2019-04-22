<?php $title = "Test page"; ?>
@extends('layout.base')
@section('content')
<div class="card">
  <div class="card-body">
    <div id="kategori">
      <h2>Total Laporan Perkategori</h2>
      <div style="width: 40%; height: 40%;">
        <canvas id="cat" width="400" height="400"></canvas>
      </div>
    </div>
    <div id="bulan">
      <h2>Total Laporan Perbulan</h2>
      <div style="width: 40%; height: 40%;">
        <canvas id="month" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection
@section('AddScript')
<script>
var ctx = document.getElementById('cat').getContext('2d');
var cat = new Chart(ctx, {
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
  });
</script>
<script>
var ctx = document.getElementById('month').getContext('2d');
var month = new Chart(ctx, {
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
</script>
@endsection
