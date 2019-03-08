@extends('layout.base')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
        	<div class="row">
        			<h4>Track Ticket</h4>
        			<ul class="timeline">
                        @foreach($status_arr as $status)
        				<li>
                            <div class="padleft">
                                        <a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
                                        <a href="#" class="datefloat">21 March, 2014</a>
                                        <p>
                                            @if($status == 1)
                                                Masalah

                                            @elseif($status == 2 )

                                                status 2
                                            @elseif($status == 3)

                                                status 3
                                            @elseif($status == 4)
                                                status 4
                                            @endif
                                        </p>
                            </div>
                        </li>
                        @endforeach
        			</ul>
        	</div>
        </div>
      </div>
    </div>
  </div>
@endsection