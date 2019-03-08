@extends('layout.base')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
        	<div class="row">
        			<h4>Track Ticket</h4>
        			<ul class="timeline">
                        @foreach($stats as $status)
        				<li>
                            <div class="padleft">
                                        <a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
                                        <a href="#" class="datefloat">{{$status->created_at}}</a>
                                        <p>
                                            @if($status->status == 1)
                                                Masalah

                                            @elseif($status->status == 2 )

                                                status 2
                                            @elseif($status->status == 3)

                                                status 3
                                            @elseif($status->status == 4)
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