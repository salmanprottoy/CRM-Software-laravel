@extends('layout')
@section('content')
@include('partials.navbar')
@include('partials.accountingSells_sidebar')

<div class="main-container">
	<h1>Accounting Sells Report</h1>
    <br>
    <div>
        <a class="btn btn-outline-primary" href="{{ route('accountingSellsHome.getPdf') }}" role="button">Download Report</a>
	</div>
    <br>
    <h5>Customer Information</h5>
	<p>
        Total Customer: {{$totalCustomer}}
        <br>
        Active Customer: {{$activeCustomer}}
        <br>
        Male Customer: {{$maleCustomer}}
        <br>
        Female Customer: {{$femaleCustomer}}
        <br>
    </p>

    <h5>Product Information</h5>
    <p>
        Total Product: {{$totalProduct}}
        <br>
        Total product in Stock: {{$totalProductInStock}}
        <br>

    </p>
</div>
@endsection