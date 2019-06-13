<aside class="main-sidebar hidden-print " >
  <section class="sidebar" id="sidebar-scroll">
    <div class="user-panel">
      <div class="f-left image">
        @if(Auth::user()->role == 1)
        <img src="{{ url('https://ui-avatars.com/api/?name='.Auth::user()->jabatan.'+Desk&background=1b8bf9&color=fff&rounded=true') }}" alt="User Image" class="img-circle">
        @else
        <img src="{{ url('https://ui-avatars.com/api/?name='.Auth::user()->jabatan.'&background=1b8bf9&color=fff&rounded=true') }}" alt="User Image" class="img-circle">
        @endif
      </div>
      <div class="f-left info">
        <span style="display: block; margin-bottom: 12px"><b>{{ Auth::user()->name }}</b></span>
        <span>{{ Auth::user()->jabatan }}</span>
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
      <li id="create" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('createTicket') }}">
          <i class="icon-note"></i><span> Buat Tiket Laporan</span>
        </a>
      </li>
      <li id="ongoing" class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('ongoingTicket') }}">
          <i class="icon-direction"></i><span> On Going Ticket</span>
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
