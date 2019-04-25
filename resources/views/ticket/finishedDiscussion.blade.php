<?php $title = "Log Diskusi"; ?>
@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Diskusi Permasalahan</h4>
    </div>
</div>
<div class="card">
<div class="card-block">
    <div class="col-md-9">
        <h1> Ticket #{{$tickets->nomor_ticket}}</h1>
    </div>
    <div class="col-md-1">
        <a target="_blank" href="{{route('printTicket', $tickets->id)}}" onclick="event.preventDefault(); document.getElementById('printTicket').submit();"
          class="btn btn-primary">Print</a>        
          <form action="{{route('printTicket')}}" id="printTicket" method="POST">
          @csrf
          <input type="hidden" name="ticket" value="{{$tickets->id}}">
          </form>
    </div>
    <div class="col-md-1">
        <a class="btn btn-danger">Hapus</a>        
    </div>
    <table class="table table-borderless">
    <tbody>
        <tr>
          <th>Status</th>
            <td>
                @if($tickets->finish == 0)
                    Terbuka
                @else  
                    Ditutup
                @endif
            </td>

          	<th>Nama</th>
          	<td>{{$tickets->aduan->nama}}</td>
        </tr>
        <tr>
          <th>Prioritas</th>
            <td>{{$tickets->urgensi}}</td>

            <th>Email</th>
          	<td>{{$tickets->aduan->email}}</td>
        </tr>
        <tr>
          <th>Tanggal Dibuat</th>
            <td>{{$tickets->created_at}}</td>

            <th>Telepon</th>
            <td>{{$tickets->aduan->no_telp}}</td>
        </tr>
      <tr>
      <th>Assigned To</th>
            @php    
                $user = DB::table('users')->where('id', $tickets->isAssigned->users_id)->first();                
            @endphp
          	<td>{{$user->name}} ({{$user->jabatan}})</td>

            <th>Kategori</th>
            <td>
                @if($tickets->aduan->kategori_id == 1)
                    Login Error
                @elseif($tickets->aduan->kategori_id == 2)
                    Instalasi Jaringan
                @else
                    Lainnya
                @endif

            </td>
            
        </tr>
    </tbody>
    </table>
</div>
  <div class="card-block">
    <div class="discuss">
      <div class="diskusi col-md-12">
        <div class="discuss-wrap">        
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
    </div>
  </div>     
</div>
@endsection