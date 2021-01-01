@extends('marketpartial/marketsidebars') 
	@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!--testing-->
				<div class="card-box mb-30">                                                                                      
				  <div class="pd-20">   
				  <div class="card-body">
			            <form action="{{ route('import.csv','leads') }}" method="POST" name="importform" 
			               enctype="multipart/form-data">
			                <input type="hidden" name="_token" value="{{csrf_token()}}">
			                <input type="file" name="file" class="form-control">
			                <br>
			                <button class="btn btn-success">Import File</button>
			            </form>
			        </div> 
				  <div class="table-title pl-20">
                    <div class="row">
                        
                        <div class="col-sm-6 pl-20"><a class="btn btn-primary" href="{{route('marketuser.pdf',['leads'])}}" role="button" id="pdf">To PDF</a></div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input type="text" id="search" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                 </div>    
				  <div class="pd-20">
				  	<table class="table table-striped" id="leads">
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
				    	@for($i=0; $i < count($userlist); $i++)
							<tr>
								<td>{{$userlist[$i]->id}}</td>
								<td>{{$userlist[$i]->name}}</td>
								<td>{{$userlist[$i]->email}}</td>
								<td>{{$userlist[$i]->phone}}</td>
								<!-- <td>
									<a href="/user/edit/<%=userlist[i].id%>">Edit</a> | 
									<a href="/user/delete/<%=userlist[i].id%>">Delete</a>  
								</td> -->
								<td>{{$userlist[$i]->gender}}</td>
								@if($userlist[$i]->status=='Potential')
								<td><span class="badge badge-success">{{$userlist[$i]->status}}</span></td>
								@else
								<td><span class="badge badge-secondary">{{$userlist[$i]->status}}</span></td>
								@endif
								<td><a class="btn btn-primary" href="{{route('marketuser.profile',['leads',$userlist[$i]->id])}}">Profile</a></td>  
								<td><a class="btn btn-primary" href="{{route('marketuser.delete',['leads',$userlist[$i]->id])}}">Delete</a></td>
								<td><a class="btn btn-primary" href="{{route('marketuser.upgradestatus',$userlist[$i]->id)}}">Upgrade</a></td>
							</tr>
						@endfor
				    </tbody>
				  </table>
				  </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){

		 fetch_customer_data();

		 function fetch_customer_data(query = '')
		 {
		  $.ajax({
		   url:"{{ route('live_search.action','leads') }}",
		   method:'GET',
		   data:{query:query},
		   dataType:'json',
		   success:function(data)
		   {
		    $('#myTable').html(data.table_data);
		   }
		  })
		 }

		 $(document).on('keyup', '#search', function(){
		  var query = $(this).val();
		  fetch_customer_data(query);
		 });
		});
	</script>
	@endsection