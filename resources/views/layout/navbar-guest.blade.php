<header class="main-header-top hidden-print">
  <a href="{{route('index')}}" class="logo"><img class="img-fluid able-logo" src="{{ asset('logo.png') }}" width="50%" alt="Theme-logo"></a>
  <nav class="navbar navbar-static-top">
    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu f-right">
      <ul class="top-nav">
        <!-- User Menu-->
        <li>
        <a href="{{route('guestCreateTicket')}}">Buat Tiket Baru</a>
        <a href="{{route('guestIndexStatus')}}">Cek Status Tiket</a>        
        </li>
      </ul>
    </div>
  </nav>
</header>