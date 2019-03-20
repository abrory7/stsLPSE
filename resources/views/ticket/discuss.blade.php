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
        <div class="incoming f-left">
          <img src="{{ asset('res/assets/images/avatar-1.png') }}" class="incomingava" alt="User Image" class="img-circle">
          <span class="incominguser">Helpdesk</span>
          <br>
          <div class="incomingmsg">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
          <div class="incomingdate">
            19 Maret<br>12.51
          </div>
        </div>
        <div class="outgoing f-right">
          <div class="outgoingdate">
            19 Maret<br>12.51
          </div>
          <span class="outgoinguser">Saya</span>
          <br>
          <div class="outgoingmsg">
            test tarus test terus test tarus test terus
          </div>
        </div>
        <div class="incoming f-left">
          <img src="{{ asset('res/assets/images/avatar-1.png') }}" class="incomingava" alt="User Image" class="img-circle">
            <span class="incominguser">Helpdesk</span>
            <br>
            <div class="incomingmsg">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.
            </div>
            <div class="incomingdate">
              19 Maret<br>12.51
            </div>
        </div>
        <div class="outgoing f-right">
          <div class="outgoingdate">
            19 Maret<br>12.51
          </div>
          <span class="outgoinguser">Saya</span>
          <br>
          <div class="outgoingmsg">
            test test test test test test test test test test test
          </div>
        </div>
        <div class="incoming">
          <img src="{{ asset('res/assets/images/avatar-1.png') }}" class="incomingava" alt="User Image" class="img-circle">
            <span class="incominguser">Helpdesk</span>
            <br>
            <div class="incomingmsg">
            Lorem
          </div>
          <div class="incomingdate">
            19 Maret<br>12.51
          </div>
        </div>
        <div class="incoming">
          <img src="{{ asset('res/assets/images/avatar-1.png') }}" class="incomingava" alt="User Image" class="img-circle">
            <span class="incominguser">Helpdesk</span>
            <br>
            <div class="incomingmsg">
            Lorem
          </div>
          <div class="incomingdate">
            19 Maret<br>12.51
          </div>
        </div>
        <div class="outgoing f-right">
          <div class="outgoingdate">
            19 Maret<br>12.51
          </div>
          <span class="outgoinguser">Saya</span>
          <br>
          <div class="outgoingmsg">
            test test test test test test test test test test test
          </div>
        </div>
        <div class="outgoing f-right">
          <div class="outgoingdate">
            19 Maret<br>12.51
          </div>
          <span class="outgoinguser">Saya</span>
          <br>
          <div class="outgoingmsg">
            test test test test test test test test test test test
          </div>
        </div>
      </div>
    </div>
    <div class="sendmsg form-inline">
      <form method="post">
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
