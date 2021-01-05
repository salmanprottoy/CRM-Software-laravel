@extends('layout')
@section('content')
@include('partials.navbar')
@include('partials.accountingSells_sidebar')

<div class="main-container">
    <h2 align=center>Bank Information</h2>
    <br>
    <div>
		<select class="form-control mr-sm-2" id="searchBy">
			<option selected hidden>Search By</option>
			<option value="accountName">Account Name</option>
			<option value="accountNumber">Account Number</option>
			<option value="bankName">Bank Name</option>
		</select>
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search Bank Info" aria-label="Search Bank Info">
	</div>
	<script type="text/javascript">
		
		$(document).ready(function(){
		$('#search').on('keyup',function(){
			var search = $("#search").val();
			var searchBy = $("#searchBy").val();
			$.ajax({
				url: "{{ route('accountingSellsHome.bankInfo.search') }}",
				method: 'get',
				datatype : 'json',
				data : {'search':search,
						'searchBy':searchBy},
				success:function(response){
						var tableBody="<tr><td>#</td><td>Account Name</td><td>Account Number</td><td>Bank Name</td><td>Action</td></tr>";
						response.forEach(element => {
							var tableRow="";
							tableRow+="<td>"+element.id+"</td>";
							tableRow+="<td>"+element.accountName+"</td>";
							tableRow+="<td>"+element.accountNumber+"</td>";
							tableRow+="<td>"+element.bankName+"</td>";
							tableRow+="<td><a href='../accountingSellsHome/BankInfo/edit/"+element.id+"'>Edit</a></td>";
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
    <div class="card-box mb-30">
		<div class="pb-20">
        <table class="table hover multiple-select-row data-table-export nowrap" id="table">
            <tr>
                <th>#</td>
                <th>Account Name</td>
                <th>Account Number</td>
                <th>Bank Name</td>
                <th>Action</th>
            </tr>

            @for($i = 0 ; $i < count($bankInfo); $i++ )
            <tr>
                <td>{{$bankInfo[$i]['id']}}</td>
                <td>{{$bankInfo[$i]['accountName']}}</td>
                <td>{{$bankInfo[$i]['accountNumber']}}</td>
                <td>{{$bankInfo[$i]['bankName']}}</td>
                <td>
                    <a href="{{ route('accountingSellsHome.bankInfo.edit', $bankInfo[$i]['id']) }}">Edit</a>
                </td>
            </tr>
            @endfor
        </table>
        </div>	
    </div>				
</div>

@endsection