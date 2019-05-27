<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

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

    <!-- Datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>

<div class="wrapper">
    @include('layout.navbar-guest')
    @yield('content')
</div>
<script src="{{ asset('res/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('res/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('res/assets/plugins/tether/dist/js/tether.min.js') }}"></script>
    @yield('addScript')
</body>
</html>
