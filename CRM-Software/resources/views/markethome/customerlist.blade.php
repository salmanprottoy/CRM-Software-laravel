@extends('marketpartial/marketsidebars') 
	@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!--testing-->
				<div class="card-box mb-30">                                                                                      
				  <div class="pd-20">    
				  <div class="table-title pl-20">
				  	 <div class="card-body">
			            <form action="{{ route('import.csv','customer') }}" method="POST" name="importform" 
			               enctype="multipart/form-data">
			                <input type="hidden" name="_token" value="{{csrf_token()}}">
			                <input type="file" name="file" class="form-control">
			                <br>
			                <button class="btn btn-success">Import File</button>
			            </form>
			        </div>
                    <div class="row">
                        <div class="col-sm-1.5 pl-20"><a class="btn btn-primary" href="/markethome/csv/<%='customer'%>" role="button">To CSV</a></div>
                        <div class="col-sm-6 pl-20"><a class="btn btn-primary" href="{{route('marketuser.pdf',['customer'])}}" role="button" id="pdf">To PDF</a></div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input type="text" id="search" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                 </div>    
				  <div class="pd-20">
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
								<td>{{$userlist[$i]->id}}</td>
								<td>{{$userlist[$i]->customerName}}</td>
								<td>{{$userlist[$i]->customerEmail}}</td>
								<td>{{$userlist[$i]->customerContactNumber}}</td>  
								<td>{{$userlist[$i]->customerGender}}</td>
								<td><span class="badge badge-danger">{{$userlist[$i]->customerStatus}}</span></td>
								<td><a class="btn btn-primary" href="{{route('marketuser.profile',['customer',$userlist[$i]->id])}}">Profile</a></td>  
								<td><a class="btn btn-primary" href="{{route('marketuser.delete',['customer',$userlist[$i]->id])}}">Delete</a></td>
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
		   url:"{{ route('live_search.action','customer') }}",
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