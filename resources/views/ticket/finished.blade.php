<?php $title = "Tiket Selesai"; ?>
@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Tiket Selesai</h4>
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
                        <td>{{date_format($ticket->created_at, 'd-m-Y')}}</td>
                        <td>
                            @if($ticket->finish == 1)
                                Selesai
                            @else
                                Expired
                            @endif
                        </td>
                        <td>
                        <a href="{{ route('finishedDiscussion', $ticket->id)}}" class="btn btn-default" target="_blank" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Log Diskusi"><i class="icon-bubbles"></i></a>
                        <a href="{{ route('destroyTicket')}}" class="btn btn-danger" onclick="event.preventDefault();
                            document.getElementById('hapus-ticket').submit(); confirm('Apakah anda yakin akan menghapus tiket ini?')" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" title="Hapus Tiket"><i class="icon-trash"></i></a>

                            <form id="hapus-ticket" action="{{ route('destroyTicket') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $ticket->id }}">
                            </form>
                        </td>
                    </tr>
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
      var element = document.getElementById("finished");
      element.classList.add("active");
    }
</script>
@stop
