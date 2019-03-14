@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>On Going Ticket</h4>
    </div>
</div>
<div class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <sup>Klik no. tiket untuk melacak tiket</sup>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No. Tiket</th>
                        <th>Urgensi</th>
                        <th>Judul Laporan</th>
                        <th>Kategori</th>
                        <th>Dibuat Pada</th>
                        <th>Limit Penyelesaian</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($tickets as $ticket)
                        <td><a href="{{ route('trackTicket') }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>{{$ticket->nomor_ticket}}</u></a></td>
                        <td class="bg-danger">{{$ticket->urgensi}}</td>
                        <td>{{$ticket->aduan->subjek}}</td>
                        <td>{{$ticket->aduan->kategori->kategori}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td>{{$ticket->expire}}</td>
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
      var element = document.getElementById("ongoing");
      element.classList.add("active");
    }
</script>
@stop
