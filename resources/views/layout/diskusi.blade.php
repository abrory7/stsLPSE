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
