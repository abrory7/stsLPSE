<?php $title = "Lacak Status Tiket"; ?>
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
											<b>
  											@if($status->status == 1)

  												Diterima Helpdesk

  											@elseif($status->status == 2 )
  											@php
  												$user = DB::table('users')->where('id', $status->ticket->isAssigned->users_id)->first();
  											@endphp
  												Ditugaskan kepada {{$user->jabatan}}
  											@elseif($status->status == 3)
  												Sedang dikerjakan oleh {{$user->name}} ({{$user->jabatan}})
  											@elseif($status->status == 4)
  												Tiket Selesai
  											@endif
                      </b>
											<span class="datefloat">{{$status->created_at}}</span>
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
