@extends('layout')
@section('content')
@include('partials.navbar')
@include('partials.accountingSells_sidebar')

<div class="main-container">
    <div>
        <a class="btn btn-outline-primary" href="{{ route('accountingSellsHome.customer.create') }}" role="button">Create Customer</a>
	</div>
    <hr>
	<h2 align=center>Customer Information</h2>
	<br>
	<div>
		<select class="form-control mr-sm-2" id="searchBy">
			<option selected hidden>Search By</option>
			<option value="customerName">Customer Name</option>
			<option value="customerContactNumber">Customer Contact Number</option>
			<option value="customerAddress">Customer Address</option>
		</select>
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search Customer" aria-label="Search Customer">
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		$('#search').on('keyup',function(){
			var search = $("#search").val();
			var searchBy = $("#searchBy").val();
			$.ajax({
				url: "{{ route('accountingSellsHome.customer.search') }}",
				method: 'get',
				datatype : 'json',
				data : {'search':search,
						'searchBy':searchBy},
				success: function(response){
					//alert(response);
						var tableBody="<tr><td>#</td><td>Name</td><td>Contact Number</td><td>Address</td><td>Email</td><td>Status</td><td>Gender</td><td>Action</td></tr>";
						response.forEach(element => {
							var tableRow="";
							tableRow+="<td>"+element.id+"</td>";
							tableRow+="<td>"+element.customerName+"</td>";
							tableRow+="<td>"+element.customerContactNumber+"</td>";
							tableRow+="<td>"+element.customerAddress+"</td>";
							tableRow+="<td>"+element.customerEmail+"</td>";
							tableRow+="<td>"+element.customerStatus+"</td>";
							tableRow+="<td>"+element.customerGender+"</td>";
							tableRow+="<td><a href='../accountingSellsHome/Customer/edit/"+element.id+"'>Edit</a> | <a href='../accountingSellsHome/Customer/delete/"+element.id+"'>Delete</a></td>";
							tableBody=tableBody+"<tr>"+tableRow+"</tr>";
						});
					 $('#table').html(tableBody);
				},
				error:function(response){
					alert('server error');
				}
			});
		});
	});
	</script>
	<hr>
	<!-- <div><a class="btn btn-success" href="/accountingSellsHome/customer/csv" role="button">To CSV</a>
	</div>
	<hr>
	<div><a class="btn btn-success" href="/accountingSellsHome/pdf" role="button" id="pdf">To PDF</a>
	</div> -->
	<hr>
	<div class="card-box mb-30">
		<div class="pb-20">
		<table class="table hover data-table  nowrap" id="table">
			<tr>
				<th class="table-plus datatable-nosort">#</td>
				<th>Name</td>
				<th>Contact Number</td>
				<th>Address</td>
				<th>Email</td>
				<th>Status</td>
				<th>Gender</td>
				<th>Action</td>
			</tr>
	
			@for($i=0; $i< count($customerList); $i++ )
			<tr>
				<td class="table-plus">{{$customerList[$i]['id']}}</td>
				<td>{{$customerList[$i]['customerName']}}</td>
				<td>{{$customerList[$i]['customerContactNumber']}}</td>
				<td>{{$customerList[$i]['customerAddress']}}</td>
				<td>{{$customerList[$i]['customerEmail']}}</td>
				<td>{{$customerList[$i]['customerStatus']}}</td>
				<td>{{$customerList[$i]['customerGender']}}</td>
				<td>
					<a href="{{ route('accountingSellsHome.customer.edit', $customerList[$i]['id']) }}">Edit</a>	|
					<a href="{{ route('accountingSellsHome.customer.delete', $customerList[$i]['id']) }}">delete</a>
				</td>
			</tr>
            @endfor
		</table>
		</div>	
	</div>			
</div>
 
@endsection