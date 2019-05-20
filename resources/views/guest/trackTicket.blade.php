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
              <?php $finish = 0; ?>
							@foreach($ticket_status as $status)
                @php
                  $user = DB::table('users')->where('id', $status->ticket->isAssigned->users_id)->first();                  
                @endphp
        				<li>
                <?php $finish = 1;?>
									<div class="padleft">										
											@if($status->status == 1)
                      <a target="_blank" href="#">
												Diterima Helpdesk
                      </a>
											@elseif($status->status == 2 )	
                      <a target="_blank" href="#">                      										
												Ditugaskan kepada {{$user->jabatan}}
                      </a>
											@elseif($status->status == 3)
                      <a target="_blank" href="#">
												Sedang dikerjakan oleh ({{$user->jabatan}})
                      </a>
											@elseif($status->status == 4)
                      <a target="_blank" href="#">
												Tiket Selesai
                      </a>                        
                        @if($solusi != NULL)
                          <p>Keterangan: {{$solusi->solusi}}</p>
                        @endif
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
							@if(!($discuss->member == 1 || $discuss->member == 2 || $discuss->member == 3))
								<div class="outgoing">
									<span class="outgoinguser">{{$ticket->aduan->email}}</span>
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
                      <span class="incominguser"> <strong>{{$discuss->member}}</strong> </span>
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
        @if($finish == 0)
					<form name="formSendMsg">
					@csrf
          <meta name="csrf-token" content="{{ csrf_token() }}">
						<textarea id="pesan" name="pesan" class="form-control" rows="4" cols="39" placeholder="Tulis Pesan...." required></textarea>
						<button type="submit" class="btn btn-success sendbutton">KIRIM</button>
					</form>
        @endif
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

  if(!(senderName == 'Helpdesk' || senderName == 'Admin Sistem' || senderName == 'Verifikator' || senderName == 'Admin PPE')){
    //Append outgoinguser dan outgoingmsgText
        
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
var channel = pusher.subscribe('discuss-channel_'+ diskusi_id);
channel.bind('message-sent', function(data) {
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
    "member" : "{{$ticket->aduan->email}}",
    "pesan" : $('textarea[name=pesan]').val(),
    "date" : "{{date('Y-m-d H:i:s')}}",    
    "sender" : "{{$ticket->aduan->email}}"  
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
