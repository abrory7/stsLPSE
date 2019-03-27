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
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($tickets as $ticket)
                        <td><a href="{{ route('trackTicket', $ticket->nomor_ticket) }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>{{$ticket->nomor_ticket}}</u></a></td>
                        <td class="bg-danger">{{$ticket->urgensi}}</td>
                        <td>{{$ticket->aduan->subjek}}</td>
                        <td>{{$ticket->aduan->kategori->kategori}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td>{{$ticket->expire}}</td>
                        <td>
                            @if(null !== $ticket->isAssigned)
                                @php
                                    $user = DB::table('users')->where('id', $ticket->isAssigned->users_id)->first();
                                @endphp
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#myModal" disabled>Assigned To {{$user->jabatan}}</button>
                            @else
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$ticket->id}}">Assign Ticket</button>
                            @endif
                          <a href="{{ route('closeTicket') }}" class="btn btn-success"
                             onclick="event.preventDefault();
                                           document.getElementById('close-ticket').submit();">
                              Akhiri Tiket
                          </a>

                          <form id="close-ticket" action="{{ route('closeTicket') }}" method="POST" style="display: none;">
                              @csrf
                              <input type="hidden" name="nomor_ticket" value="{{ $ticket->id }}">
                          </form>

                            <!-- MODAL -->
                          <div id="myModal{{$ticket->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Assign Ticket</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('assignTicket')}}" method="POST">
                                    @php
                                        $users = DB::table('users')->get();
                                    @endphp
                                        @csrf
                                        <label for="assign to"> Assign To</label>
                                        <select name="assignTo" class="form-control">
                                        @foreach($users as $user)
                                            <option value="{{$user->role}}">{{$user->jabatan}}</option>
                                        @endforeach
                                        </select>
                                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}" class="form-control">
                                        <input type="hidden" name="nomor_ticket" value="{{$ticket->nomor_ticket}}" class="form-control">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>

                            </div>
                        </div>
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
      var element = document.getElementById("ongoing");
      element.classList.add("active");
    }
</script>
@stop
