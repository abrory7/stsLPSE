<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title>
    
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
      @include('layout.navbar')
      <!-- Side-Nav-->
      @include('layout.sidebar')
      <div class="content-wrapper">
        <!-- Container-fluid starts -->
          <!-- Main content starts -->
          @yield('content')
          <!-- Main content ends -->
        <!-- Container-fluid ends -->

      </div>
    </div>
    <!-- script -->
    @include('layout.script')
  </body>
</html>
