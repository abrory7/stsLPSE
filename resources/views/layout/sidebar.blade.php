<aside class="main-sidebar hidden-print " >
  <section class="sidebar" id="sidebar-scroll">
    <div class="user-panel">
      <div class="f-left image"><img src="{{ ('res/assets/images/avatar-1.png') }}" alt="User Image" class="img-circle"></div>
      <div class="f-left info">
        <p>Help Desk</p>
      </div>
    </div>

    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="nav-level">Navigation</li>
      <li class="active treeview">
        <a class="waves-effect waves-dark" href="{{ route('index') }}">
          <i class="icon-speedometer"></i><span> Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('ongoing') }}">
          <i class="icon-direction"></i><span> On Going Ticket</span>
        </a>
      </li>
      <li class="treeview">
        <a class="waves-effect waves-dark" href="{{ route('createTicket') }}">
          <i class="icon-note"></i><span> Buat Tiket Laporan</span>
        </a>
      </li>
      <li class="treeview">
        <a class="waves-effect waves-dark" href="basic-table.html">
          <i class="icon-check"></i><span> Tiket Selesai</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
