<?php $title = 'Daftar Tiket'; ?>
@extends('layout.base')
@section('content')
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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                    <tr>

                    <td><a href="{{ route('trackTicket', $ticket->nomor_ticket) }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>{{$ticket->nomor_ticket}}</u></a></td>
                        @if($ticket->urgensi == "Darurat")
                          <td class="bg-danger">{{$ticket->urgensi}}</td>
                        @elseif($ticket->urgensi == "Penting")
                          <td class="bg-warning">{{$ticket->urgensi}}</td>
                        @elseif($ticket->urgensi == "Normal")
                          <td>{{$ticket->urgensi}}</td>
                        @endif
                        <td>{{$ticket->aduan->subjek}}</td>
                        <td>{{$ticket->aduan->kategori->kategori}}</td>
                        <td>{{date_format($ticket->created_at, "d-m-Y H:i:s")}}</td>
                        <td>{{$ticket->expire}}</td>
                        <td>
                            @if($ticket->finish == 1)
                            Selesai
                            @elseif($ticket->finish == 2)
                            Expire
                            @else
                            Ongoing
                            @endif
                        </td>
                        <td><a href="{{route('detailTiketPimpinan', $ticket->id)}}" class="btn btn-secondary" target="_blank">Detail</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('AddScript')
<script type="text/javascript">
    function actnav() {
      var element = document.getElementById("daftar-tiket");
      element.classList.add("active");
    }
</script>
@endsection
