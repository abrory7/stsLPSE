<?php $title = "Diskusi"; ?>
@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Diskusi Permasalahan</h4>
    </div>
</div>
<div class="card">
  <div class="card-block">
    <center>
      <span>Member:&nbsp;
        @foreach($listmember as $members)
        <div class="label label-default">
          @if($members == 1)
            Helpdesk
          @elseif($members == 2)
            Admin
          @endif
        </div>
        @endforeach
      </span>
      <button class="badge bg-primary" data-toggle="modal" data-target="#inviteModal"><b>+</b></button>
    </center>
    <div class="discuss">
      <div class="diskusi col-md-12">
        @foreach($diskusi as $discuss)
          @if(Auth::user()->id == $discuss->member)
            <div class="outgoing f-right">
              <div class="outgoingdate">
                {{ date_format($discuss->created_at, "j F") }}
                <br>
                {{ date_format($discuss->created_at, "H.i")}}
              </div>
              <span class="outgoinguser">Saya</span>
              <br>
              <div class="outgoingmsg">
                {{ $discuss->pesan }}
              </div>
            </div>
            @else
              <div class="incoming f-left">
                <img src="{{ asset('res/assets/images/avatar-1.png') }}" class="incomingava" alt="User Image" class="img-circle">
                @if($discuss->member == 1)
                  <span class="incominguser">Helpdesk</span>
                  <br>
                @elseif($discuss->member == 2)
                  <span class="incominguser">Admin</span>
                  <br>
                @endif
                <div class="incomingmsg">
                  {{ $discuss->pesan }}
                </div>
                <div class="incomingdate">
                  {{ date_format($discuss->created_at, "j F") }}
                  <br>
                  {{ date_format($discuss->created_at, "H.i") }}
                </div>
              </div>
            @endif
          @endforeach
      </div>
    </div>
    <div class="sendmsg form-inline">
      <form action="{{ route('sendMsg', $diskusiticket->id) }}" method="post">
        @csrf
        <textarea id="pesan" name="pesan" class="form-control" rows="4" cols="39" placeholder="Tulis Pesan...." required></textarea>
        <button type="submit" class="btn btn-success sendbutton">KIRIM</button>
      </form>
    </div>
  </div>
  <!-- MODAL -->
  <div id="inviteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Invite Member</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('inviteMember', $diskusiticket->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="invite">Pilih user yang akan diundang menjadi member diskusi</label>
              <select name="member" class="form-control">
                @foreach($member as $member)
                  <option value="{{$member->id}}">{{$member->name}}</option>
                @endforeach
              </select>
              <input type="hidden" name="diskusi_id" value="{{$diskusiticket->diskusi_id}}" class="form-control">
            <button type="submit" class="btn btn-primary">Invite</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
