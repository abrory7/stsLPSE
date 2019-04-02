<?php $title = "Beri Solusi"; ?>
@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Beri Solusi</h4>
    </div>
</div>
<div class="card">
  <div class="card-block">
    <div class="row">
      <form action="{{route('addSolution')}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" id="aduan_id" name="ticket_id" value="{{ $ticket->id }}">
        <div class="form-group">
          <label for="solusi">Solusi:</label>
          <input type="text" id="solusi" name="solusi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@stop
