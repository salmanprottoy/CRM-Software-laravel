@extends('layout')

@section('content')

    @include('partials.navbar')
    @include('partials.superAdmin_sidebar')

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>pricing Table</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index[$i]['html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">pricing Table</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>


			<div class="pull-right">
				<a href="{{route('superAdmin.package.show')}}">
					<button type="button" class="btn btn-primary">Edit Package</button>
				</a>
			</div>
			<h4 class="mb-30 mt-30 text-blue h4">Pricing Table Style </h4>

           

			<div class="row">
                @for ($i = 0; $i < count($package); $i++)
				<div class="col-md-4 mb-30">
					<div class="card-box pricing-card-style2">
						<div class="pricing-card-header">
							<div class="left">
								<h5>Standard</h5>
								<p>For small businesses</p>
							</div>
							<div class="right">
								<div class="pricing-price">
									€100<span>/month</span>
								</div>
							</div>
						</div>
						<div class="pricing-card-body">
							<div class="pricing-points">
								<ul>
									<li>{{ $package[$i]['s1']}}</li>
									<li>{{ $package[$i]['s2'] }}</li>
									<li>{{ $package[$i]['s3'] }}</li>
									<li>{{ $package[$i]['s4'] }}</li>
									<li>{{ $package[$i]['s5'] }}</li>
									<li>{{ $package[$i]['s6'] }}</li>

								</ul>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-md-4 mb-30">
					<div class="card-box pricing-card-style2">
						<div class="pricing-card-header">
							<div class="left">
								<h5>Advance</h5>
								<p>For big businesses</p>
							</div>
							<div class="right">
								<div class="pricing-price">
									€150<span>/month</span>
								</div>
							</div>
						</div>
						<div class="pricing-card-body">
							<div class="pricing-points">
								<ul>
									<li>{{ $package[$i]['a1'] }}</li>
									<li>{{ $package[$i]['a2'] }}</li>
									<li>{{ $package[$i]['a3'] }}</li>
									<li>{{ $package[$i]['a4'] }}</li>
									<li>{{ $package[$i]['a5'] }}</li>
									<li>{{ $package[$i]['a6'] }}</li>
								</ul>
							</div>
						</div>	
					</div>
				</div>
				<div class="col-md-4 mb-30">
					<div class="card-box pricing-card-style2">
						<div class="pricing-card-header">
							<div class="left">
								<h5>Enterprise</h5>
								<p>For enterprises</p>
							</div>
							<div class="right">
								<div class="pricing-price">
									€250<span>/month</span>
								</div>
							</div>
						</div>
						<div class="pricing-card-body">
							<div class="pricing-points">
								<ul>
									<li>{{ $package[$i]['e1'] }}</li>
									<li>{{ $package[$i]['e2'] }}</li>
									<li>{{ $package[$i]['e3'] }}</li>
									<li>{{ $package[$i]['e4'] }}</li>
									<li>{{ $package[$i]['e5'] }}</li>
									<li>{{ $package[$i]['e6'] }}</li>
								</ul>
							</div>
						</div>
					</div>
                </div>
                @endfor
            </div>
            
		</div>

	</div>
</div>
</div>
@endsection