@extends('layout')
@section('content')
@include('partials.accountingSells_navbar')
@include('partials.accountingSells_sidebar')

<div class="main-container">
	<h1>Accounting Sells Report</h1>
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
    <br>
    <div>
        <a class="btn btn-outline-primary" href="{{ route('accountingSellsHome.getPdf2') }}" role="button">Download Customer Report</a>
	</div>
    <br>

    <hr>

    <h5>Product Information</h5>
    <p>
        Total Product: {{$totalProduct}}
        <br>
        Total product in Stock: {{$totalProductInStock}}
        <br>
    </p>
    <br>
    <div>
        <a class="btn btn-outline-primary" href="{{ route('accountingSellsHome.getPdf1') }}" role="button">Download Product Report</a>
	</div>
    <br>
</div>
@endsection