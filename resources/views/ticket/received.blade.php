<?php $title = "Tiket Masuk"; ?>
@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Tiket Masuk</h4>
    </div>
</div>
<div class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <sup>Klik no. tiket untuk melacak tiket</sup>
                <table id="dataTable" class="display">
                    <thead>
                    <tr>
                        <th>No. Tiket</th>
                        <th>Urgensi</th>
                        <th>Judul Laporan</th>
                        <th>Kategori</th>
                        <th>Dibuat Pada</th>
                        <th>Limit Penyelesaian</th>
                        <th>Jenis Laporan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($receives as $received)


                      @if($received->assignedTicket->finish == 0)
                      <tr>
                        <td><a href="{{ route('trackTicket', $received->assignedTicket->nomor_ticket) }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>{{$received->assignedTicket->nomor_ticket}}</u></a></td>
                        @if($received->assignedTicket->urgensi == "Darurat")
                          <td class="bg-danger">{{$received->assignedTicket->urgensi}}</td>
                        @elseif($received->assignedTicket->urgensi == "Penting")
                          <td class="bg-warning">{{$received->assignedTicket->urgensi}}</td>
                        @elseif($received->assignedTicket->urgensi == "Normal")
                          <td>{{$received->assignedTicket->urgensi}}</td>
                        @endif
                        <td>{{$received->assignedTicket->aduan->subjek}}</td>
                        <td>{{$received->assignedTicket->aduan->kategori->kategori}}</td>
                        <td>{{date_format($received->assignedTicket->created_at, 'd-m-Y H:i:s')}}</td>
                        <td>{{$received->assignedTicket->expire}}</td>
                        <td>
                          @if($received->assignedTicket->isGuest == 1)
                            Web
                          @else
                            Langsung
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('discussTicket', $received->assignedTicket->id)}}" class="btn btn-primary" target="_blank" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Diskusi"><i class="icon-bubbles"></i></a>
                        </td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@section('AddScript')
<script type="text/javascript">
    function actnav() {
      var element = document.getElementById("received");
      element.classList.add("active");
    }
</script>
@stop
