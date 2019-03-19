@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Diskusi Permasalahan</h4>
    </div>
</div>
<div class="card">
    <div class="card-block">
          <div style="margin: 0 10% 0 10%">
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
                  mengharukand dsad
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
                  mengharukan ddsf sd fsd sdfsdfsdfsdfds fsd fsd
                </div>
              </div>
              <div class="incoming f-left">
                <img src="{{ asset('res/assets/images/avatar-1.png') }}" class="incomingava" alt="User Image" class="img-circle">
                  <span class="incominguser">Helpdesk</span>
                  <br>
                  <div class="incomingmsg">
                  Lorem ipsum dolor
                </div>
                <div class="incomingdate">
                  19 Maret<br>12.51
                </div>
              </div>
          </div>

            </div>
        </div>
</div>
@stop
