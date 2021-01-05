@extends('layout')
@section('content')
@include('partials.navbar')
@include('partials.accountingSells_sidebar')

<div class="main-container">
    <div class="pd-20 card-box mb-30">
	<form method="post">
        @csrf
        @foreach ($errors->all() as $err)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> {{ $err }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
			<legend>Create Customer</legend>
            <div class="card-box mb-30">
		        <div class="pb-20">
                    <table class="table hover multiple-select-row data-table-export nowrap" id="table">
                        <tr>
                            <td>Customer Name</td>
                            <td><input type="text" name="customerName" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Contact Number</td>
                            <td><input type="text" name="customerContactNumber" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="customerAddress" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="customerEmail" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><input type="text" name="customerStatus" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Genger</td>
                            <td><input type="text" name="customerGender" class="form-control"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Create" class="btn btn-outline-success"></td>
                        </tr>
                    </table>
                    </div>	
                </div>	
	</form>
    </div>
</div>
 
@endsection