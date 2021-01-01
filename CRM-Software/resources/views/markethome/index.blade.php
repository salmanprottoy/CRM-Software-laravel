@extends('marketpartial/marketsidebars') 
	@section('content')
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{asset('assets/vendors/images/banner-img.png')}}">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back  <div class="weight-600 font-30 text-blue">{{$username}}</div>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection