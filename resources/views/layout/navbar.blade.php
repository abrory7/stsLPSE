<header class="main-header-top hidden-print">
  <a href="{{route('index')}}" class="logo"><img class="img-fluid able-logo" src="{{ asset('logo.png') }}" width="50%" alt="Theme-logo"></a>
  <nav class="navbar navbar-static-top">

    <!-- Sidebar toggle button-->
    <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>

    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu f-right">
      <ul class="top-nav">
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
