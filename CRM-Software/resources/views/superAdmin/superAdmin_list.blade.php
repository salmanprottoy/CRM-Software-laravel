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
                            <a href="/supAdmin_home/supAdmin/create">
                                <button type="button" class="btn btn-primary"><i class="fa fa-user-plus"></i></button>
                            </a>
                         </div>
                    </div>

                </div>
                
                <div class="pb-20">

                    <table class="table hover data-table  nowrap ">
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
 
@endsection

