<?php $title = "Home"; ?>
@extends('layout.base')
@section('content')
 <div class="row">
     <div class="main-header">
         <h4>Dashboard</h4>
     </div>
 </div>
 <!-- 4-blocks row start -->
 <div class="row m-b-30 dashboard-header">
     <div class="col-lg-3 col-sm-6">
         <div class="col-sm-12 card dashboard-product">
             <span>On Going Ticket</span>
             <h2 class="dashboard-total-products counter">{{ count($allTicket) }}</h2>
             Tiket
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
        			<h4>Butuh Tanggapan Segera</h4>
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
                      {{ $tiket->nomor_ticket }}
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
@stop
@section('AddScript')
<script type="text/javascript">
    function actnav() {
      var element = document.getElementById("home");
      element.classList.add("active");
    }
</script>
@stop
