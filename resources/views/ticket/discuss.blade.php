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
        <a href="{{route('detailTicket', $tickets->aduan_id)}}" class="btn btn-default">Detail Tiket</a>
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
    <div class="sendmsg form-inline">
    @if($chatAble)
      <form name="formSendMsg">    
      @csrf   
        <textarea id="pesan" name="pesan" class="form-control" rows="4" cols="39" placeholder="Tulis Pesan...." required></textarea>
        <button type="submit" class="btn btn-success sendbutton">KIRIM</button>
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
          <form action="{{ route('inviteMember', $diskusiticket->id) }}" method="POST">
          @csrf
          <meta name="csrf-token" content="{{ csrf_token() }}">
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
  const outgoingdate = document.createElement("div");
  const outgoinguserText = document.createTextNode("saya");
  const outgoinguser = document.createElement("span");
  const chatMsg = document.createTextNode(msg);
  const outgoingmsg = document.createElement("div");
  const incomingLeft = document.createElement("div")  
  const userImg = document.createElement("img");
  const incomingUser = document.createElement("span");
  const incomingMsg = document.createElement("div")
  const incomingDate = document.createElement("div");
  const brElement = document.createElement("BR");
  const brElementDate = document.createElement("BR");
  const hariIni = document.createTextNode(hari);
  const waktuIni = document.createTextNode(waktu);
  outgoingright.setAttribute("class", "outgoing f-right");
  outgoingdate.setAttribute("class", "outgoingdate");  
  outgoinguser.setAttribute("class", "outgoinguser");
  outgoingmsg.setAttribute("class", "outgoingmsg");
  incomingLeft.setAttribute("class", "incoming f-left");
  userImg.setAttribute("src", "{{ asset('res/assets/images/avatar-1.png') }}");
  userImg.setAttribute("class", "incomingava img-circle")
  userImg.setAttribute("alt", "User Image")  
  incomingUser.setAttribute("class" , "incominguser")
  incomingMsg.setAttribute("class", "incomingmsg")
  incomingDate.setAttribute("class", "incomingdate")
  let userName = "";
  if(AuthenticateUser == 1){    
    userName = document.createTextNode(`${senderName}`)    
  }else if(AuthenticateUser == 2){
    userName = document.createTextNode(`${senderName}`)
  }



  if(AuthenticateUser){  
    //Append outgoinguser dan outgoingmsgText
    outgoinguser.appendChild(userName)
    outgoingmsg.appendChild(chatMsg)
    outgoingdate.appendChild(hariIni)
    outgoingdate.appendChild(brElementDate)
    outgoingdate.appendChild(waktuIni)    

    //Append all element to chatWrapper
    //Append all element to outgoingright
    outgoingright.appendChild(outgoingdate);
    outgoingright.appendChild(outgoinguser);
    outgoingright.appendChild(brElement);
    outgoingright.appendChild(outgoingmsg);
    chatWrapper.appendChild(outgoingright);  
  }else{
    outgoinguser.appendChild(userName)
    outgoingmsg.appendChild(chatMsg)
    outgoingdate.appendChild(hariIni)
    outgoingdate.appendChild(brElementDate)
    outgoingdate.appendChild(waktuIni)   

    outgoingright.appendChild(userImg);
    outgoingright.appendChild(incomingUser);
    outgoingright.appendChild(incomingMsg);
    outgoingright.appendChild(brElement);
    outgoingright.appendChild(incomingDate);
    chatWrapper.appendChild(outgoingright);
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
  let senderName = "{{Auth::user()->name}}";
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
    "date" : "{{date('Y-m-d H:i:s')}}"
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