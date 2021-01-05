@extends('layout')
@section('content')
@include('partials.navbar')
@include('partials.accountingSells_sidebar')

<div class="main-container">
    <h2 align=center>Salary Information</h2>
    <br>
    <div>
		<select class="form-control mr-sm-2" id="searchBy">
			<option selected hidden>Search By</option>
			<option value="employeeId">Employee ID</option>
			<option value="salaryGrade">Salary Grade</option>
            <option value="salaryMin">Min Salary</option>
            <option value="tableRow">Max Salary</option>
		</select>
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search Salary Info" aria-label="Search Salary Info">
	</div>
	<script type="text/javascript">
		
		$(document).ready(function(){
		$('#search').on('keyup',function(){
			var search = $("#search").val();
			var searchBy = $("#searchBy").val();

			$.ajax({
				url: "{{ route('accountingSellsHome.salary.search') }}",
				method: 'get',
				datatype : 'json',
				data : {'search':search,
						'searchBy':searchBy},
				success:function(response){
						var tableBody="<tr><td>#</td><td>Employee ID</td><td>Salary Grade</td><td>Min Salary</td><td>Max Salary</td>";
						response.forEach(element => {
							var tableRow="";
							tableRow+="<td>"+element.id+"</td>";
							tableRow+="<td>"+element.employeeId+"</td>";
							tableRow+="<td>"+element.salaryGrade+"</td>";
                            tableRow+="<td>"+element.salaryMin+"</td>";
                            tableRow+="<td>"+element.salaryMax+"</td>";
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
                <th>Employee ID</td>
                <th>Salary Grade</td>
                <th>Min Salary</td>
                <th>Max Salary</td>
            </tr>

            @for($i=0; $i< count($salaryList); $i++ )
            <tr>
                <td>{{$salaryList[$i]['id']}}</td>
                <td>{{$salaryList[$i]['employeeId']}}</td>
                <td>{{$salaryList[$i]['salaryGrade']}}</td>
                <td>{{$salaryList[$i]['salaryMin']}}</td>
                <td>{{$salaryList[$i]['salaryMax']}}</td>
            </tr>
            @endfor
        </table>	
        </div>	
    </div>			
</div>
 
@endsection