<!DOCTYPE html>
<html lang="en">

  <head>
    <title>{{$title}} | STS LPSE Provinsi Kalimantan Selatan</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('res/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('res/assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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

    <!-- Datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    @yield('custom-css')
  </head>
  <body class="sidebar-mini fixed" onload="actnav()">

    <div class="wrapper">

      <!-- Navbar-->
      @include('layout.navbar')
      <!-- Side-Nav-->
      @include('layout.sidebar')
      <div class="content-wrapper">
        <!-- Container-fluid starts -->
          <!-- Main content starts -->
          <div class="container-fluid">
            @yield('content')
          </div>
          <!-- Main content ends -->
        <!-- Container-fluid ends -->

      </div>
    </div>
    <!-- script -->
    @include('layout.script')
  </body>
</html>
