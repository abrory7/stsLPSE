<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('res/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('res/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/icon/icofont/css/icofont.css') }}">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/icon/simple-line-icons/css/simple-line-icons.css') }}">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Weather css -->
    <link href="{{ asset('res/assets/css/svg-weather.css') }}" rel="stylesheet">

    <!-- Echart js -->
    <script src="{{ asset('res/assets/plugins/charts/echarts/js/echarts-all.js') }}"></script>

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/main.css') }}">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/responsive.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/custom.css') }}">

    <!--color css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/color/color-1.min.css') }}" id="color"/>

  </head>
  <body class="sidebar-mini fixed">
    <div class="loader-bg">
      <div class="loader-bar">
      </div>
    </div>
    <div class="wrapper">

      <!-- Navbar-->
      <header class="main-header-top hidden-print">
        <a href="index.html" class="logo"><img class="img-fluid able-logo" src="{{ ('res/assets/images/logo.png') }}" alt="Theme-logo"></a>
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
                        <img class="img-circle" src="assets/images/avatar-2.png" alt="User Image">
                      </span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block-time">20min ago</span></div>
                    </a>
                  </li>
                  <li class="bell-notification">
                    <a href="javascript:;" class="media">
                      <span class="media-left media-icon">
                        <img class="img-circle" src="assets/images/avatar-3.png" alt="User Image">
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
                <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                  <i class="icon-size-fullscreen"></i>
                </a>
              </li>
              <!-- User Menu-->
              <li>
                <div class="tooltip-link">
                  <a href="#!"data-toggle="tooltip" data-trigger="hover" data-placement="bottom"><i class="icon-logout"></i></a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print " >
        <section class="sidebar" id="sidebar-scroll">
          <div class="user-panel">
            <div class="f-left image"><img src="{{ ('res/assets/images/avatar-1.png') }}" alt="User Image" class="img-circle"></div>
            <div class="f-left info">
              <p>John Doe</p>
              <p class="designation">UX Designer <i class="icofont icofont-caret-down m-l-5"></i></p>
            </div>
          </div>

          <!-- sidebar profile Menu-->
          <ul class="nav sidebar-menu extra-profile-list">
            <li>
              <a class="waves-effect waves-dark" href="profile.html">
                <i class="icon-user"></i>
                <span class="menu-text">View Profile</span>
                <span class="selected"></span>
              </a>
            </li>
            <li>
              <a class="waves-effect waves-dark" href="javascript:void(0)">
                <i class="icon-settings"></i>
                <span class="menu-text">Settings</span>
                <span class="selected"></span>
              </a>
            </li>
            <li>
              <a class="waves-effect waves-dark" href="javascript:void(0)">
                <i class="icon-logout"></i>
                <span class="menu-text">Logout</span>
                <span class="selected"></span>
              </a>
            </li>
          </ul>

          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="nav-level">Navigation</li>
            <li class="active treeview">
              <a class="waves-effect waves-dark" href="index.html">
                <i class="icon-speedometer"></i><span> Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a class="waves-effect waves-dark" href="basic-table.html">
                <i class="icon-list"></i><span> Table</span>
              </a>
            </li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <!-- Container-fluid starts -->
          <!-- Main content starts -->
          @yield('content')
          <!-- Main content ends -->
        <!-- Container-fluid ends -->

      </div>
    </div>

    <!-- Required Jqurey -->
    <script src="{{ asset('res/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('res/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('res/assets/plugins/tether/dist/js/tether.min.js') }}"></script>

    <!-- Required Fremwork -->
    <script src="{{ asset('res/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- waves effects.js -->
    <script src="{{ asset('res/assets/plugins/Waves/waves.min.js') }}"></script>

    <!-- Scrollbar JS-->
    <script src="{{ asset('res/assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('res/assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>

    <!--classic JS-->
    <script src="{{ asset('res/assets/plugins/classie/classie.js') }}"></script>

    <!-- notification -->
    <script src="{{ asset('res/assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>

    <!-- Rickshaw Chart js -->
    <script src="{{ asset('res/assets/plugins/d3/d3.js') }}"></script>
    <script src="{{ asset('res/assets/plugins/rickshaw/rickshaw.js') }}"></script>

    <!-- Sparkline charts -->
    <script src="{{ asset('res/assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

    <!-- Counter js  -->
    <script src="{{ asset('res/assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('res/assets/plugins/countdown/js/jquery.counterup.js') }}"></script>

    <!-- custom js -->
    <script type="text/javascript" src="{{ asset('res/assets/js/main.js') }} "></script>
    <script type="text/javascript" src="{{ asset('res/assets/pages/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('res/assets/pages/elements.js') }}"></script>
    <script src="{{ asset('res/assets/js/menu.min.js') }}"></script>

    <script>
      var $window = $(window);
      var nav = $('.fixed-button');
      $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
          nav.addClass('active');
        }
        else {
          nav.removeClass('active');
        }
      });
    </script>
  </body>
</html>
