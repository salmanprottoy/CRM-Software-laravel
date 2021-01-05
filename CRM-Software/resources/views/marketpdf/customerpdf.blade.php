<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
	<div>Customers in percentage: {{$count}}%</div>
	<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>id</th>
				        <th>Fullname</th>
				        <th>email</th>
				        <th>phone</th>
				        <th>gender</th>
				        <th>status</th>
				      </tr>
				    </thead>
				    <tbody id="myTable">
				    	@for($i=0; $i< count($userlist); $i++ )
							<tr>
								<td>{{$userlist[$i]['id']}}</td>
								<td>{{$userlist[$i]['customerName']}}</td>
								<td>{{$userlist[$i]['customerEmail']}}</td>
								<td>{{$userlist[$i]['customerContactNumber']}}</td>  
								<td>{{$userlist[$i]['customerGender']}}</td>
								<td>{{$userlist[$i]['customerStatus']}}</td>		
							</tr>
						@endfor
				    </tbody>
				  </table>
</body>
</html>