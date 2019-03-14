@extends('layout.base')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
        	<div class="row">
        			<h4>Track Ticket</h4>
        			<ul class="timeline">							
							@foreach($ticket_status as $status)						
        				<li>
									<div class="padleft">
											<a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
											<a href="#" class="datefloat">{{$status->created_at}}</a>
											<p>
													@if($status->status == 1)
															Diterima HelpDesk

													@elseif($status->status == 2 )

															Diterima Admin Sistem
													@elseif($status->status == 3)

															Diterima Admin PPE
													@elseif($status->status == 4)
															Diterima Verifikator
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
@stop
