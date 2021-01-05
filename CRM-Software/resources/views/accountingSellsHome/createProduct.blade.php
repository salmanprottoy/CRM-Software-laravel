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
            <h3>Insert New Product</h3>
            <div class="card-box mb-30">
		        <div class="pb-20">
                    <table class="table hover multiple-select-row data-table-export nowrap" id="table">
                        <tr>
                            <td>Product Code</td>
                            <td><input type="text" name="productCode" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                            <td><input type="text" name="productName" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Product Vendor</td>
                            <td><input type="text" name="productVendor" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Quantity In Stock</td>
                            <td><input type="text" name="quantityInStock" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Buy Price</td>
                            <td><input type="text" name="buyPrice" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Sell Price</td>
                            <td><input type="text" name="sellPrice" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Product Description</td>
                            <td><input type="text" name="productDescription" class="form-control"></td>
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