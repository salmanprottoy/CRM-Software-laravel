<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
<meta name="csrf_token" content="{{csrf_token()}}" charset="utf-8">
	<title>CRM Software</title>

	<!-- Site favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/vendors/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/vendors/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/vendors/images/favicon-16x16.png')}}">

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
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/styles/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/jquery-steps/jquery.steps.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/src/plugins/fullcalendar/fullcalendar.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<script src="{{asset('assets/src/darkmode-js.min.js')}}"></script>
	<script>
	new Darkmode({
  
  label: '🌓', 
  bottom: '34px',
  right: '0px',
  mixColor: '#fff',
  autoMatchOsTheme: true }).showWidget();
	</script>
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
	
	@yield('content')

    <script src="{{asset('assets/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('assets/src/plugins/jquery-steps/jquery.steps.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/steps-setting.js')}}"></script>
	<script src="{{asset('assets/src/plugins/jQuery-Knob-master/jquery.knob.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/highcharts-6.0.7/code/highcharts.js')}}"></script>
	<script src="{{asset('assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js')}}"></script>
	<script src="{{asset('assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/dashboard2.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/core.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/script.min.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/process.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/layout-settings.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/calendar-setting.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
	<script src="{{asset('assets/src/plugins/datatables/js/vfs_fonts.js')}}"></script>
	<script src="{{asset('assets/vendors/scripts/datatable-setting.js')}}"></script>
	<script src="{{ asset('assets/js/image.js') }}"></script>

	{{-- <script src="{{asset('assets/src/darkmode-js/darkmode.js')}}"></script>
<script>var DarkMode = new DarkMode();</script> --}}

	{{-- <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script> --}}
	<script src="{{asset('assets/src/darkmode-js.min.js')}}"></script>
	<script>
	new Darkmode({
  
  label: '🌓', 
  bottom: '34px',
  right: '0px',
  mixColor: '#fff',
  autoMatchOsTheme: true }).showWidget();
	</script>

{{-- bottom: '64px', // default: '32px'
  right: 'unset', // default: '32px'
  left: '32px', // default: 'unset'
  time: '0.5s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#fff',  // default: '#fff'
  buttonColorDark: '#100f2c',  // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: false, // default: true,
  label: '🌓', // default: ''
  autoMatchOsTheme: true // default: true --}}

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script>
		toastr.options = {
  "closeButton": true,
   "progressBar": true,
};
		@if(Session::has('messege'))
			var type="{{Session::get('alert-type','info')}}"
			switch(type){
				case 'info':
					toastr.info("{{ Session::get('messege') }}");
					break;
				case 'success':
					toastr.success("{{ Session::get('messege') }}");
					break;
				case 'warning':
				toastr.warning("{{ Session::get('messege') }}");
					break;
				case 'error':
					toastr.error("{{ Session::get('messege') }}");
				break;
		}
	  @endif
   </script> 
   <script>  
	$(document).on("click", "#delete", function(e){
		e.preventDefault();
		var link = $(this).attr("href");
		   swal({
			 title: "Are you Want to delete?",
			 text: "Once Delete, This will be Permanently Delete!",
			 icon: "warning",
			 buttons: true,
			 dangerMode: true,
		   })
		   .then((willDelete) => {
			 if (willDelete) {
				  window.location.href = link;
			 } 
		   });
	   });
	   $(document).on("click", "#block", function(e){
		e.preventDefault();
		var link = $(this).attr("href");
		   swal({
			 title: "Are you Want to block?",
			 text: "Once Delete, This will be Permanently Delete!",
			 icon: "warning",
			 buttons: true,
			 dangerMode: true,
		   })
		   .then((willDelete) => {
			 if (willDelete) {
				  window.location.href = link;
			 } 
		   });
	   });
</script> 
</body>
</html>