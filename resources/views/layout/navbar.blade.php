<header class="main-header-top hidden-print">
  <a href="{{route('index')}}" class="logo"><img class="img-fluid able-logo" src="{{ ('res/assets/images/logo.png') }}" alt="Theme-logo"></a>
  <nav class="navbar navbar-static-top">

    <!-- Sidebar toggle button-->
    <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>

    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu f-right">
      <ul class="top-nav">

        <!--Notification Menu-->
        <li class="dropdown notification-menu">
          <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
            <i class="icon-bell"></i>
            <span class="badge badge-danger header-badge">9</span>
          </a>
          <ul class="dropdown-menu">
            <li class="not-head">You have <b class="text-primary">4</b> new notifications.</li>
            <li class="bell-notification">
              <a href="javascript:;" class="media">
                <span class="media-left media-icon">
                  <img class="img-circle" src="{{ ('res/assets/images/avatar-1.png') }}" alt="User Image">
                </span>
                <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block-time">2min ago</span></div>
              </a>
            </li>
            <li class="bell-notification">
              <a href="javascript:;" class="media">
                <span class="media-left media-icon">
                  <img class="img-circle" src="{{ ('res/assets/images/avatar-2.png') }}" alt="User Image">
                </span>
                <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block-time">20min ago</span></div>
              </a>
            </li>
            <li class="bell-notification">
              <a href="javascript:;" class="media">
                <span class="media-left media-icon">
                  <img class="img-circle" src="{{ ('res/assets/images/avatar-3.png') }}" alt="User Image">
                </span>
                <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block-time">3 hours ago</span></div>
              </a>
            </li>
            <li class="not-footer">
              <a href="#!">See all notifications.</a>
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
