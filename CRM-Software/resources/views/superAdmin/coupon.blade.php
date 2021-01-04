@extends('layout')

@section('content')

    @include('partials.navbar')
    @include('partials.superAdmin_sidebar')


	<div class="main-container">

        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-250px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Subscriber List</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Subscriber List</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>




                @if (!empty($errors->all()))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Oopppssss!</strong> {{ 'Insertion failed' }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4"> Admin List</h4>

                            </div>
                            <div class="pull-right">

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#admin_create"><i class="fa fa-user-plus"></i></button>

                            </div>
                        </div>

                    </div>

                    <div class="pb-20">

                        <table class="table data-table  nowrap ">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">ID</th>
                                    <th>Coupon Name</th>
                                    <th>Discount Amount</th>
                                   

                                    

                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($coupon); $i++)
                                    <tr>
                                        <td class="table-plus">{{ $coupon[$i]['id'] }}</td>

                                        
                                        <td>{{ $coupon[$i]['coupon'] }}</td>
                                        <td>{{ $coupon[$i]['discount'] }}</td>
                                       

                                       

                                    </tr>
                                @endfor

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

	</div>
	


{{-- <div class="main-container">
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
                @for ($i = 0; $i < count($coupon); $i++)
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
									<li>{{ $coupon[$i]['s1']}}</li>
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
				
                @endfor
            </div>
            
		</div>

	</div>
</div>
</div> --}}
@endsection