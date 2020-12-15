@extends('layout')  

@section('content')

@include('partials.navbar')
@include('partials.superAdmin_sidebar')
<div class="main-container">
   
        <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-250px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Subscriber List</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Subscriber List</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>




            <!-- <div class="card-box mb-30" style="float: right; padding-right: 20px; padding-top: 20px;">
                <a href="/user/create">
                    <button type="button" class="btn btn-primary">Primary</button>
                </a>
             </div> -->



            <div class="card-box mb-30">
                <div class="pd-20">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Super Admin List</h4>
                            
                        </div>
                        <div class="pull-right">
                           
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#superAdmin_create"><i class="fa fa-user-plus"></i></button>
                         
                         </div>
                    </div>

                </div>
                
                <div class="pb-20">

                    <table class="table data-table  nowrap ">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Gender</th>
                               
                                <th class="datatable-nosort">Action</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i < count($superAdmin); $i++)
                            <tr>
                                <td class="table-plus">{{$superAdmin[$i]['id']}}</td>
                                <td>{{$superAdmin[$i]['Name']}}</td>
                                <td>{{$superAdmin[$i]['Mobile']}}</td>
                                <td>{{$superAdmin[$i]['Email']}}</td>
                                <td>{{$superAdmin[$i]['Gender']}}</td>
                               
                                <td>

                                
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                               
                                            </div>
                                        </div>
                                    
                                </td>
                                <td>{{$superAdmin[$i]['Address']}}</td>
                            </tr>
                            @endfor

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="modal fade" id="superAdmin_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('superAdmin.superAdmin.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="form-group" style="display: none;">
						<label>UserType</label>
						<input class="form-control" type="text" value="Super Admin" name="type" readonly>
					</div>

					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" >
					</div>
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" placeholder="" id="unamecreate" name="username">
						<div id="alert">

						</div>
					</div>
					<div class="form-group">
						<label>Mobile</label>
						<input class="form-control" type="number" name="mobile">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" placeholder="bootstrap@example.com" type="email" name="email">
					</div>
					<div class="form-group">
						<label>Gender</label>
						<select class="form-control" name="gender">
							<option disabled selected>Choose..</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Others">Others</option>
						</select>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" name="address"></textarea>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" class="form-control-file form-control height-auto" name="image">
						
					</div>
					
				
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" id=btn_insert name="infoUpdate" value="Insert">
            </div>
            </form>
        </div>
    </div>
</div>
</div>
 
@endsection

