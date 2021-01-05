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
			<legend>Edit Product</legend>
            <div class="card-box mb-30">
		        <div class="pb-20">
                <table class="table hover multiple-select-row data-table-export nowrap" id="table">
                    <tr>
                        <td>Product Code</td>
                        <td><input type="text" name="productCode" value="{{$productCode}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><input type="text" name="productName" value="{{$productName}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Product Vendor</td>
                        <td><input type="text" name="productVendor" value="{{$productVendor}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Quantity In Stock</td>
                        <td><input type="number" name="quantityInStock" value="{{$quantityInStock}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Buy Price</td>
                        <td><input type="text" name="buyPrice" value="{{$buyPrice}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Sell Price</td>
                        <td><input type="text" name="sellPrice" value="{{$sellPrice}}" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Product Description</td>
                        <td><input type="text" name="productDescription" value="{{$productDescription}}" class="form-control"></td>
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
 
@endsection