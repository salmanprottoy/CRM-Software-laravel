<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>CRM Software</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="/assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/src/plugins/fullcalendar/fullcalendar.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
    </script>
    
</head>
<body>
	
	<div class="login-header box-shadow">
	<div class="container-fluid d-flex justify-content-between align-items-center">
		<div class="brand-logo">
			<a href="/">
				<img src="../assets/vendors/images/deskapp-logo.svg" alt="">
			</a>
		</div>
		<div class="login-menu">
			<ul>
				<!-- <li><a href="register.html">Register</a></li> -->
			</ul>
		</div>
	</div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7">
				<img src="../assets/vendors/images/login-page-img.png" alt="">
			</div>
			<div class="col-md-6 col-lg-5">
				<div class="login-box bg-white box-shadow border-radius-10">
					<div class="login-title">
						<h2 class="text-center text-primary">Login To DeskApp</h2>
					</div>
					<form method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="input-group custom">
							<input type="text" class="form-control form-control-lg" placeholder="Username" name="username">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
							</div>
						</div>
						<div class="input-group custom">
							<input type="password" class="form-control form-control-lg" placeholder="**********" name="password">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
							</div>
						</div>
						<div class="row pb-30">
							<div class="col-6">
								<!-- <div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck1">
									<label class="custom-control-label" for="customCheck1">Remember</label>
								</div> -->
							</div>
							<div class="col-6">
								<!-- <div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div> -->
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									
										
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
									
									<!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
									<!-- <input type="button" type="submit" value="Log In"> -->
								<!-- </div>
								<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
								<div class="input-group mb-0">
									<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
								</div> -->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

    <script src="/assets/vendors/scripts/core.js"></script>
	<script src="/assets/vendors/scripts/script.min.js"></script>
	<script src="/assets/vendors/scripts/process.js"></script>
	<script src="/assets/vendors/scripts/layout-settings.js"></script>
	<script src="/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="/assets/vendors/scripts/steps-setting.js"></script>
	<script src="/assets/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
	<script src="/assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="/assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="/assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="/assets/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="/assets/vendors/scripts/dashboard2.js"></script>
	<script src="/assets/vendors/scripts/core.js"></script>
	<script src="/assets/vendors/scripts/script.min.js"></script>
	<script src="/assets/vendors/scripts/process.js"></script>
	<script src="/assets/vendors/scripts/layout-settings.js"></script>
	<script src="/assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/src/plugins/fullcalendar/fullcalendar.min.js"></script>
	<script src="/assets/vendors/scripts/calendar-setting.js"></script>
	<!-- buttons for Export datatable -->
	<script src="/assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="/assets/src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="/assets/vendors/scripts/datatable-setting.js"></script>
</body>
</html>