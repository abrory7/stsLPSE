<?php $title = "Test page"; ?>
@extends('layout.base')
@section('content')
<div class="card">
  <div class="card-body">
    <div style="width: 40%; height: 40%;">
      <canvas id="myChart" width="400" height="400"></canvas>
    </div>
  </div>
</div>
@endsection
@section('AddScript')
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php foreach($cat as $kategori){ echo '\''.$cat->aduan->kategori->kategori.'\','; } ?>],
        datasets: [
          {
            data: [<?php echo $cat1->count(); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
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
