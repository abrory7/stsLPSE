<aside class="main-sidebar hidden-print " >
  <section class="sidebar" id="sidebar-scroll">
    <div class="user-panel">
      <div class="f-left image"><img src="{{ asset('res/assets/images/avatar-1.png') }}" alt="User Image" class="img-circle"></div>
      <div class="f-left info">
        <p>{{ Auth::user()->name }}</p>
      </div>
    </div>

    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="nav-level">Navigation</li>
      <li id="home" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('index') }}">
          <i class="icon-speedometer"></i><span> Dashboard</span>
        </a>
      </li>
      @can('isHelpdesk')
      <li id="ongoing" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('ongoingTicket') }}">
          <i class="icon-direction"></i><span> On Going Ticket</span>
        </a>
      </li>
      @endcan
      @can('isHelpdesk')
      <li id="create" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('createTicket') }}">
          <i class="icon-note"></i><span> Buat Tiket Laporan</span>
        </a>
      </li>
      <li id="received" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('receivedTicket') }}">
          <i class="icon-list"></i><span> Tiket Masuk</span>
        </a>
      </li>
      @endcan
      @can('isAdmin')
      <li id="received" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('receivedTicket') }}">
          <i class="icon-list"></i><span> Tiket Masuk</span>
        </a>
      </li>
      @endcan
      @if(Auth::user()->role == 1 || Auth::user()->role == 2)
      <li id="finished" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('finishedTicket') }}">
          <i class="icon-check"></i><span> Tiket Selesai</span>
        </a>
      </li>
      @else
      <li id="daftar-tiket" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('daftarTiketPimpinan') }}">
          <i class="icon-check"></i><span> Daftar Tiket</span>
        </a>
      </li>
      @endif

    </ul>
  </section>
</aside>
