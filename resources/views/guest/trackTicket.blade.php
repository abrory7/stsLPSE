@section('title', 'Status Ticket')
@extends('guest.base')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
        	<div class="row">
        			<h4>Track Ticket</h4>
        			<ul class="timeline">
							@foreach($ticket_status as $status)
        				<li>
									<div class="padleft">
											<a target="_blank" href="#">
											@if($status->status == 1)
												Diterima Helpdesk
											@elseif($status->status == 2 )
											@php
												$user = DB::table('users')->where('id', $status->ticket->isAssigned->users_id)->first();
											@endphp
												Ditugaskan kepada {{$user->jabatan}}
											@elseif($status->status == 3)												
												Sedang dikerjakan oleh ({{$user->jabatan}}) 		
											@elseif($status->status == 4)
												Tiket Selesai																																																			
											@endif
											</a>
											<a href="#" class="datefloat">{{$status->created_at}}</a>
									</div>
							</li>
							@endforeach
        			</ul>
        	</div>
        </div>

        <!-- CHAT -->
				<div class="card-block">
				<div class="discuss">
					<div class="diskusi col-md-12">
						<div class="discuss-wrap">        
						@foreach($diskusi as $discuss)
							@if($discuss->member != 1)
								<div class="outgoing f-right">
									<div class="outgoingdate">
										{{ date_format($discuss->created_at, "j F") }}
										<br>
										{{ date_format($discuss->created_at, "H.i")}}
									</div>
									<span class="outgoinguser">{{$ticket->aduan->email}}</span>
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
					<form name="formSendMsg">    
					@csrf   
          <meta name="csrf-token" content="{{ csrf_token() }}">
						<textarea id="pesan" name="pesan" class="form-control" rows="4" cols="39" placeholder="Tulis Pesan...." required></textarea>
						<button type="submit" class="btn btn-success sendbutton">KIRIM</button>
					</form>				
				</div>
				
				</div>
      </div>
    </div>
  </div>

@endsection

@section('addScript')
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>

<script>
const formMsg = document.querySelector('form[name="formSendMsg"]');
const chatWrapper = document.querySelector('.discuss-wrap');

function createChat(msg, hari, waktu, AuthenticateUser, senderName){

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
  let userName = document.createTextNode(`${senderName}`);

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
var channel = pusher.subscribe('discuss-channel_'+ diskusi_id);
channel.bind('message-sent', function(data) {  
  let hari = "{{date('j F')}}";
  let waktu = "{{date('H.i')}}";  
  let senderName = "{{$ticket->aduan->email}}";
  let AuthenticateUser = data.member;  
  console.log(hari, waktu, AuthenticateUser, senderName);
  createChat(data.message,hari, waktu, AuthenticateUser, senderName);  
  
});

formMsg.addEventListener('submit',(e)=>{
  e.preventDefault();  
  //Payload
  let dataChat = {
    "diskusi_id" : "{{$diskusiticket->id}}",
    "member" : "{{$ticket->aduan->email}}",
    "pesan" : $('textarea[name=pesan]').val(),
    "date" : "{{date('Y-m-d H:i:s')}}"
  }           

  console.log(dataChat)
  // Save message to DB;
  $.ajax({
      url: '{{route("guestSendChat")}}',
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