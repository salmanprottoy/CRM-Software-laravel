@extends('layout')
@section('content')
@include('partials.navbar')
@include('partials.accountingSells_sidebar')

<div class="main-container">
	<form method="post">
    @csrf
	<legend>Delete Product</legend>
    <div class="card-box mb-30">
        <div class="pb-20">
			<table class="table hover multiple-select-row data-table-export nowrap" id="table">
				<tr>
					<td>Product Code: </td>
					<td>{{$productCode}}</td>
				</tr>
				<tr>
					<td>Product Name: </td>
					<td>{{$productName}}</td>
				</tr>
				<tr>
					<td>Product Vendor: </td>
					<td>{{$productVendor}}</td>
				</tr>
				<tr>
					<td>Quantity In Stock: </td>
					<td>{{$quantityInStock}}</td>
				</tr>
				<tr>
					<td>Buy Price: </td>
					<td>{{$buyPrice}}</td>
				</tr>
				<tr>
					<td>Sell Price: </td>
					<td>{{$sellPrice}}</td>
				</tr>
				<tr>
					<td>Product Description: </td>
					<td>{{$productDescription}}</td>
				</tr>
			</table>
        </div>
    </div>
	<div>
		<h3>Are you sure?</h3>
        <br>
		<input class="btn btn-outline-danger" type="submit" name="submit" value="Confirm">
	</div>
	</form>
</div>
 
@endsection