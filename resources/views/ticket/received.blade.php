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
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No. Tiket</th>
                        <th>Urgensi</th>
                        <th>Judul Laporan</th>
                        <th>Kategori</th>
                        <th>Dibuat Pada</th>
                        <th>Limit Penyelesaian</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($receives as $received)
                      @if($received->assignedTicket->finish == 0)
                      <tr>
                        <td><a href="{{ route('trackTicket', $received->assignedTicket->nomor_ticket) }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>{{$received->assignedTicket->nomor_ticket}}</u></a></td>
                        <td class="bg-danger">{{$received->assignedTicket->urgensi}}</td>
                        <td>{{$received->assignedTicket->aduan->subjek}}</td>
                        <td>{{$received->assignedTicket->aduan->kategori->kategori}}</td>
                        <td>{{$received->assignedTicket->created_at}}</td>
                        <td>{{$received->assignedTicket->expire}}</td>
                        <td>
                          <a href="{{ route('discussTicket', $received->assignedTicket->id)}}" class="btn btn-primary" target="_blank">Diskusi</a>
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
