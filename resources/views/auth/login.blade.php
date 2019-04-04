<!DOCTYPE html>
<html lang="en">
<head>
	<title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
		  content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">

	<!-- Favicon icon -->
	<link rel="shortcut icon" href="{{ asset('res/assets/images/favicon.png') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('res/assets/images/favicon.ico') }}" type="image/x-icon">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{ asset('res/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="{{ asset('res/assets/icon/icofont/css/icofont.css') }}">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('res/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/main.css') }}">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/responsive.css') }}">

	<!--color css-->
	<link rel="stylesheet" type="text/css" href="{{ asset('res/assets/css/color/color-1.min.css') }}" id="color"/>

</head>
<body>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" action="{{ route('login') }}" method="post">
            @csrf
						<div class="text-center">
							<img src="{{ asset('logo.png') }}" alt="logo">
						</div>
						<h3 class="text-center txt-primary">
							Support Ticketing System
							<br>
							LPSE Provinsi Kalimantan Selatan
						</h3>
						<div class="form-group">
							<label for="username">Username or email</label>
							<input type="text" id="username" name="username" class="form-control" required autofocus>
              @if ($errors->has('username'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
              @endif
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control" required>
              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
						</div
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>
<!-- Required Jqurey -->
<script src="{{ asset('res/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('res/assets/plugins/tether/dist/js/tether.min.js') }}"></script>
<!-- Required Fremwork -->
<script src="{{ asset('res/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- waves effects.js -->
<script src="{{ asset('res/assets/plugins/Waves/waves.min.js') }}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('res/assets/pages/elements.js') }}"></script>
</body>
</html>
