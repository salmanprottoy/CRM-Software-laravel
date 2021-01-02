@extends('marketpartial/marketsidebars') 
	@section('content')
<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div id="email_status" >
				  
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<!-- <% if(typeof alerts !='undefined'){alerts.forEach(function(error) {%>
							<div class="alert alert-warning alert-dismissible fade show mt-10" role="alert">
							  <strong><%=error.msg%></strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
					<%})}%> -->
				<div>
					@foreach($errors->all() as $err)
				 	 {{$err}} <br>
					@endforeach
				</div>
				<form method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" type="text" name="username" value="{{old('username')}}"  required>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Email</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" name="email" value="{{old('email')}}" type="email" id="UserEmail" onkeyup="checkemail();" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" name="phone" value="{{old('phone')}}" type="tel" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Address</label>
						<div class="col-sm-12 col-md-10">
							<input class="form-control" name="address" value="{{old('address')}}" type="tel" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
						<div class="col-sm-12 col-md-10">
							<select class="custom-select col-12" name="gender" required>
								<option value="male" selected>MALE</option>
								<option value="female">FEMALE</option>
								<option value="other">OTHERS</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Status</label>
						<div class="col-sm-12 col-md-10">
							<select class="custom-select col-12" name="status" required>
								<option value="normal" selected>NORMAL</option>
								<option value="Potential">POTENTIAL</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-12 col-md-2 col-form-label">Type</label>
						<div class="col-sm-12 col-md-10">
							<select class="custom-select col-12" name="type" required>
								<option value="leads" selected>LEADS</option>
								<option value="customer">CUSTOMER</option>
							</select>
						</div>
					</div>
					<input class="btn btn-primary" type="submit" value="Submit">
				</form>
				<!-- <script>
					function checkemail()
						{
							 var email=document.getElementById( "UserEmail" ).value;		
							 if(email)
							 {
								  $.ajax({
								  type: 'post',
								  url: '/clients/search',
								  data: {
								   user_email:email
								  },
								  success: function (response) {
								   if(response=="OK")	
								   {
								   $( '#email_status' ).html("User already exists");
								    return true;	
								   }
								   else
								   {
								   $( '#email_status' ).html(response);
								    return false;	
								   }
								  }
								  });
							 }
							 else
							 {
								  $( '#email_status' ).html("");
								  return false;
							 }
						}
				</script> -->
			</div>
		</div>
	</div>
</div>
@endsection