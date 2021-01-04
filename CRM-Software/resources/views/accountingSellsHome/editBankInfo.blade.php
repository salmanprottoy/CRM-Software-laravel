@extends('layout')  
@section('content')
@include('partials.navbar')
@include('partials.accountingSells_sidebar')

<div class="main-container">
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
			<h4>Edit Bank Info</h4>
            <div class="card-box mb-30">
		        <div class="pb-20">
                    <table class="table hover multiple-select-row data-table-export nowrap" id="table">
                        <tr>
                            <td>Account Name</td>
                            <td><input type="text" name="accountName" value="{{$accountName}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td><input type="text" name="accountNumber" value="{{$accountNumber}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Bank Name</td>
                            <td><input type="text" name="bankName" value="{{$bankName}}" class="form-control"></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Update" class="btn btn-outline-success"></td>
                        </tr>
                    </table>
                    </div>	
                </div>	
	</form>
</div>
