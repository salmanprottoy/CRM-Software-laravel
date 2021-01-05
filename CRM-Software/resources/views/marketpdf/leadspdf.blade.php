<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
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
	<div>Leads in percentage: {{$count}}%</div>
	<table>
				    <thead>
				      <tr>
				        <th style="color:red;">id</th>
				        <th>Fullname</th>
				        <th>email</th>
				        <th>phone</th>
				        <th>gender</th>
				        <th>status</th>
				      </tr>
				    </thead>
				    <tbody id="myTable">
				    	@for($i=0; $i < count($userlist); $i++)
							<tr>
								<td>{{$userlist[$i]['id']}}</td>
								<td>{{$userlist[$i]['name']}}</td>
								<td>{{$userlist[$i]['email']}}</td>
								<td>{{$userlist[$i]['phone']}}</td>
								<!-- <td>
									<a href="/user/edit/<%=userlist[i].id%>">Edit</a> | 
									<a href="/user/delete/<%=userlist[i].id%>">Delete</a>  
								</td> -->
								<td>{{$userlist[$i]['gender']}}</td>
								@if($userlist[$i]['status']=='Potential')
								<td><span class="badge badge-success">{{$userlist[$i]['status']}}</span></td>
								@else
								<td><span class="badge badge-secondary">{{$userlist[$i]['status']}}</span></td>
								@endif
							</tr>
						@endfor
				    </tbody>
				  </table>

</body>
</html>