<header class="main-header-top hidden-print">
  <a href="{{route('index')}}" class="logo"><img class="img-fluid able-logo" src="{{ asset('res/assets/images/logo.png') }}" alt="Theme-logo"></a>
  <nav class="navbar navbar-static-top">

    <!-- Sidebar toggle button-->
    <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>

    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu f-right">
      <ul class="top-nav">
          @php     
            $notif = DB::table('notif')->where('notif', 1)->where('role', Auth::user()->id)->get();                    
          @endphp
         
          
        <!--Notification Menu-->                
        <li class="dropdown notification-menu">
          <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
            <i class="icon-bell"></i>
            <span class="badge badge-danger header-badge">{{count($notif)}}</span>
          </a>
          <ul class="dropdown-menu">           
            <li class="not-head">You have <b class="text-primary">{{count($notif)}}</b> new notifications.</li>            
            @foreach($notif as $ntf)  
            @php
              $isiNotif = DB::table('ticket')->where('id', $ntf->ticket_id)->first();
            @endphp
            <li class="bell-notification">
              <a href="{{route('receivedTicket')}}" class="media">                
                <div class="media-body"><span class="block">Tiket baru #{{$isiNotif->nomor_ticket}}</span><span class="text-muted block-time">2min ago</span></div>
              </a>
            </li>       
            @endforeach          
            <li class="not-footer">
              <a href="{{route('receivedTicket')}}">Lihat Tiket Masuk</a>
            </li>
          </ul>
        </li>
        <!-- window screen -->
        <li class="pc-rheader-submenu">
          <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()"  data-toggle="tooltip" data-trigger="hover" data-placement="bottom" title="Fullscreen">
            <i class="icon-size-fullscreen"></i>
          </a>
        </li>
        <!-- User Menu-->
        <li>
          <a href="{{ route('logout') }}" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" title="Logout"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="icon-logout"></i></a>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>
    </div>
  </nav>
</header>
