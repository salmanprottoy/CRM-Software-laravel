@extends('marketpartial/marketsidebars') 
	@section('content')
	<div class="main-container">
	<!-- <div>
		<select class="form-control mr-sm-2" id="searchBy">
			<option selected hidden class='mb-6'>Search By</option>
			<option value="eventid">Campaign id</option>
			<option value="audience">Campaign audience</option>
		</select>
		<br>
        <input class="form-control mr-sm-2 mb-6" type="text" name="search" id="search" placeholder="Search Customer" aria-label="Search Customer">
        <br>
	</div>
 -->
	 <div class="table-title pl-20">
	                    <div class="row">
	                        
	                        <div class="col-sm-6 pl-20"><a class="btn btn-primary" href="{{route('marketuser.pdf',['leads'])}}" role="button" id="pdf">To PDF</a></div>
	            
	                    </div>
	                 </div>   
		<div class="card-box mb-30">
		<div class="pb-20">
		<table class="table hover multiple-select-row data-table-export nowrap" id="table" name="table">
			<tr>
				<th>id</td>
				<th>offer</td>
				<th>body</td>
				<th>audience</td>
			</tr>
	
			@for($i=0; $i < count($userlist); $i++)
			<tr>
				<td>{{$userlist[$i]->id}}</td>
				<td>{{$userlist[$i]->offer}}</td>
				<td>{{$userlist[$i]->template}}</td>
				<td>{{$userlist[$i]->audience}}</td>
				<td>
					<a class="btn btn-primary" href="{{route('market.mail',[$userlist[$i]->audience,$userlist[$i]->id])}}">SEND</a>
				</td>
			</tr>
			@endfor
		</table>
		</div>	
	</div>				
</div>
@endsection