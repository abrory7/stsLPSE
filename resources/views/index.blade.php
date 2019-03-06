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
             <h2 class="dashboard-total-products counter">3</h2>
             Tiket
             <div class="side-box bg-danger">
                 <i class="icon-direction"></i>
             </div>
         </div>
     </div>
     <div class="col-lg-3 col-sm-6">
         <div class="col-sm-12 card dashboard-product">
             <span>Tiket Selesai Minggu Ini</span>
             <h2 class="dashboard-total-products counter">7</h2>
             Tiket
             <div class="side-box bg-info">
                 <i class="icon-graph"></i>
             </div>
         </div>
     </div>
     <div class="col-lg-3 col-sm-6">
         <div class="col-sm-12 card dashboard-product">
             <span>Tiket Selesai Bulan Ini</span>
             <h2 class="dashboard-total-products counter">28</h2>
             Tiket
             <div class="side-box bg-primary">
                 <i class="icon-graph"></i>
             </div>
         </div>
     </div>

     <div class="col-lg-3 col-sm-6">
         <div class="col-sm-12 card dashboard-product">
             <span>Tiket Selesai Tahun Ini</span>
             <h2 class="dashboard-total-products counter">336</h2>
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
        			<h4>Track Ticket</h4>
        			<ul class="timeline">
        				<li>
                  <div class="padleft">
          					<a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
          					<a href="#" class="datefloat">21 March, 2014</a>
          					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                  </div>
                </li>
        				<li>
                  <div class="padleft">
          					<a href="#">21 000 Job Seekers</a>
          					<a href="#" class="datefloat">4 March, 2014</a>
          					<p>Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                  </div>
        				</li>
        				<li>
                  <div class="padleft">
          					<a href="#">Awesome Employers</a>
          					<a href="#" class="datefloat">1 April, 2014</a>
          					<p>Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                  </div>
        				</li>
        			</ul>
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
