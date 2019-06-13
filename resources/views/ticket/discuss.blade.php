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
      <h1> Ticket #{{$tickets->nomor_ticket}}</h1>
      <span class="right" style="float:right;">
        <button class="btn btn-success" data-toggle="modal" data-target="#solutionModal">Solusi</button>
        <a href="{{route('detailTicket', $tickets->aduan_id)}}" class="btn btn-default">Detail Tiket</a>
        <a href="{{ route('closeTicket') }}" class="btn btn-primary"
            onclick="event.preventDefault(); if(!confirm('apakah anda yakin untuk menghapus tiket?')) return false; document.getElementById('close-ticket').submit();";">
            Akhiri Tiket
        </a>

        <form id="close-ticket" action="{{ route('closeTicket') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="nomor_ticket" value="{{ $tickets->id }}">
        </form>
      </span>
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
              <td>{{date_format($tickets->created_at, "d-m-Y H:i:s")}}</td>

              <th>Telepon</th>
              <td>{{$tickets->aduan->no_telp}}</td>
          </tr>
        <tr>
        <th>Ditugaskan Kepada</th>
              @php                  
                  $allAssignedUser = DB::table('assign')->where('ticket_id', $tickets->id)->get();        
                  $listAssignedUser = [];
                  foreach($allAssignedUser as $allUser){
                      $user = DB::table('users')->where('id', $allUser->users_id)->first();
                      $listAssignedUser[] = $user->jabatan;
                  }                
                  $data = implode(", ", $listAssignedUser);
              @endphp
              <td>{{$data}}</td>

              <th>Kategori</th>
              <td>
                  @if($tickets->aduan->kategori_id == 1)
                      Perbaikan Data
                  @elseif($tickets->aduan->kategori_id == 2)
                      Error Aplikasi
                  @elseif($tickets->aduan->kategori_id == 3)
                      Permasalahan Login
                  @elseif($tickets->aduan->kategori_id == 4)
                      Sinkronisasi Data
                  @elseif($tickets->aduan->kategori_id == 5)
                      Permohonan Agregasi
                  @elseif($tickets->aduan->kategori_id == 6)
                      Uji Forensik
                  @elseif($tickets->aduan->kategori_id == 7)
                      Apendo Panitia                  
                  @else
                      Lain-lain
                  @endif

              </td>
          </tr>
      </tbody>
      </table>
  </div>
  <div class="card-block">
    <center>
      <span>Member:&nbsp;
        @foreach($listmember as $members)
        <div class="label label-default">
        @php
         $members = DB::table('users')->where('id', $members)->first()->jabatan;
        @endphp
         {{$members}}
        </div>
        @endforeach
      </span>
      <button class="badge bg-primary" data-toggle="modal" data-target="#inviteModal"><b>+</b></button>
    </center>
    <div class="discuss">
      <div class="diskusi col-md-12">
        <div class="discuss-wrap">
        @foreach($diskusi as $discuss)
          @if(Auth::user()->id == $discuss->member)
            <div class="outgoing">
              <span class="outgoinguser">Saya</span>
              <br>
              <div class="outgoingmsg">
                {{ $discuss->pesan }}
              </div>
              <div class="outgoingdate">
                {{ date_format($discuss->created_at, "j F") }}
                <br>
                {{ date_format($discuss->created_at, "H.i")}}
              </div>
            </div>
            @else
              <div class="incoming">
                @if($discuss->member == 1)
                  <span class="incominguser">Helpdesk</span>
                  <br>
                @elseif($discuss->member == 2)
                  <span class="incominguser">Admin</span>
                  <br>
                @else
                  <span class="incominguser"><strong>{{$discuss->member}}</strong></span>
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
    <div class="sendmsg form-inline">
    @if($chatAble)
      <form name="formSendMsg">
      @csrf
        <textarea id="pesan" name="pesan" class="form-control" rows="4" cols="39" placeholder="Tulis Pesan...." required></textarea>
        <button type="submit" class="btn btn-success col-md-5" style="display: block; margin-top: 2%;">KIRIM</button>
      </form>
    @endif
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
          <form action="{{ route('inviteMember', $diskusiticket->ticket_id) }}" method="POST">
          @csrf
          <meta name="csrf-token" content="{{ csrf_token() }}">
            @method('PUT')
            <label for="invite">Pilih user yang akan diundang menjadi member diskusi</label>
              <select name="member" class="form-control">
                @foreach($member as $member)
                    <option value="{{$member->id}}">{{$member->name}}</option>
                @endforeach
              </select>
              <input type="hidden" name="ticket_id" value="{{$diskusiticket->ticket_id}}" class="form-control">
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

  <!-- Modal untuk solusi -->
  <div class="modal fade" id="solutionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Solusi Aduan</h5>
            <div class="modal-body">
            <form method="POST" action="{{route('addSolution', $diskusiticket->ticket_id)}}">
            @csrf
              <div class="form-group">
                <label for="solusi">Masukkan Solusi Masalah</label>
                <textarea name="solusi" id="" cols="56.5" rows="4"></textarea>
              </div>
              <button class="btn btn-success" type="submit">Submit</button>
            </form>
          </div>
          </div>
        </div>
      </div>
  <!-- End modal diskusi  -->
@endsection
@section('AddScript')
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>

<script>

const formMsg = document.querySelector('form[name="formSendMsg"]');
const chatWrapper = document.querySelector('.discuss-wrap');

function createChat(msg, hari, waktu, AuthenticateUser, senderName){
  // let para = document.createElement("p");
  // let nodeText = document.createTextNode(msg);
  // para.appendChild(nodeText);
  // chatWrapper.appendChild(para);

  const outgoingright = document.createElement("div");
  const outgoinguserText = document.createTextNode("saya");
  const outgoinguser = document.createElement("span");
  const chatMsg = document.createTextNode(msg);
  const outgoingmsg = document.createElement("div");
  const outgoingdate = document.createElement("div");
  const incomingLeft = document.createElement("div")
  const incomingUser = document.createElement("span");
  const incomingMsg = document.createElement("div")
  const incomingDate = document.createElement("div");
  const brElement = document.createElement("BR");
  const brElementDate = document.createElement("BR");
  const hariIni = document.createTextNode(hari);
  const waktuIni = document.createTextNode(waktu);
  outgoingright.setAttribute("class", "outgoing");
  outgoingdate.setAttribute("class", "outgoingdate");
  outgoinguser.setAttribute("class", "outgoinguser");
  outgoingmsg.setAttribute("class", "outgoingmsg");
  incomingLeft.setAttribute("class", "incoming");
  incomingUser.setAttribute("class" , "incominguser")
  incomingMsg.setAttribute("class", "incomingmsg")
  incomingDate.setAttribute("class", "incomingdate")
  let userName = document.createTextNode(`${senderName}`);
  console.log(userName);

  if(!(senderName != '{{Auth::user()->jabatan}}')){
    //Append outgoinguser dan outgoingmsgText

    userName = document.createTextNode('Saya');
    outgoinguser.appendChild(userName);
    outgoingmsg.appendChild(chatMsg);
    outgoingdate.appendChild(hariIni);
    outgoingdate.appendChild(brElementDate);
    outgoingdate.appendChild(waktuIni);

    //Append all element to chatWrapper
    //Append all element to outgoingright
    outgoingright.appendChild(outgoinguser);
    outgoingright.appendChild(brElement);
    outgoingright.appendChild(outgoingmsg);
    outgoingright.appendChild(outgoingdate);
    chatWrapper.appendChild(outgoingright);
  }else{
    incomingUser.appendChild(userName);
    incomingMsg.appendChild(chatMsg);
    incomingDate.appendChild(hariIni);
    incomingDate.appendChild(brElementDate);
    incomingDate.appendChild(waktuIni);

    incomingLeft.appendChild(incomingUser);
    incomingLeft.appendChild(brElement);
    incomingLeft.appendChild(incomingMsg);
    incomingLeft.appendChild(incomingDate);
    chatWrapper.appendChild(incomingLeft);
  }
}
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;
var pusher = new Pusher('01313f7060ca86786294', {
    cluster: 'ap1',
    forceTLS: true
  });

//receive response dari pusher
let diskusi_id = "{{$diskusiticket->id}}"
var channel = pusher.subscribe('discuss-channel_'+diskusi_id);
channel.bind('message-sent', function(data) {
  // Buat HTML disini.
  let hari = "{{date('j F')}}";
  let waktu = "{{date('H.i')}}";
  let senderName = data.sender;
  let AuthenticateUser = data.member;
  console.log(hari, waktu, AuthenticateUser, senderName);
  createChat(data.message,hari, waktu, AuthenticateUser, senderName);

});

formMsg.addEventListener('submit',(e)=>{
  e.preventDefault();
  //Payload
  let dataChat = {
    "diskusi_id" : "{{$diskusiticket->id}}",
    "member" : "{{Auth::user()->id}}",
    "pesan" : $('textarea[name=pesan]').val(),
    "date" : "{{date('Y-m-d H:i:s')}}",
    "sender" : "{{Auth::user()->jabatan}}"
  }

  console.log(dataChat)
  // Save message to DB;
  $.ajax({
      url: '{{route("sendChat")}}',
      headers : {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(dataChat),
      dataType: "json",
      processData: false,
      success: function(){
        console.log('sukses ke kontroller')
      },
      error: function(error){
          console.log( error);
      }
    })

  formMsg.reset();
})



</script>
@endsection
