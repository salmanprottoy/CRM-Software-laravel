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




                @if (!empty($errors->all()))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Oopppssss!</strong> {{ 'Insertion failed' }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4"> Subscriber List</h4>

                            </div>
                            <div class="pull-right">

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#admin_create"><i class="fa fa-user-plus"></i></button>

                            </div>
                        </div>

                    </div>

                    <div class="pb-20">

                        <table class="table data-table  nowrap ">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">ID</th>
                                    <th>Logo</th>
                                    <th>C.Name</th>
                                    <th>C.Contact</th>
                                    <th>C.Email</th>
                                    <th>Subs. Type</th>

                                    <th class="datatable-nosort">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($subscriber); $i++)
                                    <tr 
                                    @if($subscriber[$i]['status'] == 'block')
                                    style="color:red;"
                                    @else
                                    @endif
                                    >
                                        <td class="table-plus">{{ $subscriber[$i]['id'] }}</td>

                                        <td><img class="card-image" src="{{ asset($subscriber[$i]['Company_logo']) }}" alt="Wrong Path"
                                                style="display: flex;height: 100px; width: 100px;"></img>
                                        </td>
                                        <td>{{ $subscriber[$i]['Company_Name'] }}</td>
                                        <td>{{ $subscriber[$i]['Company_Contact'] }}</td>
                                        <td>{{ $subscriber[$i]['Company_Email'] }}</td>
                                        <td >
                                            @if($subscriber[$i]['Subscription_Type'] == 'Advan')
                                            <button type="button" class="btn btn-warning btn-sm">{{ $subscriber[$i]['Subscription_Type'] }}</button>
                                            @elseif($subscriber[$i]['Subscription_Type'] == 'Stand')
                                            <button type="button" class="btn btn-info btn-sm">{{ $subscriber[$i]['Subscription_Type'] }}</button>
                                            @else
                                            <button type="button" class="btn btn-danger btn-sm">{{ $subscriber[$i]['Subscription_Type'] }}</button>
                                            @endif
                                        </td>

                                        <td>


                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                                    @if($subscriber[$i]['status'] == 'unblock')
                                                    <a class="dropdown-item edit_admin" id="block" href="{{ route('superAdmin.subscriber.block', $subscriber[$i]['id']) }}"><i class="dw dw-eye" ></i> Block</a>
                                                    @elseif($subscriber[$i]['status'] == 'block')
                                                    <a class="dropdown-item edit_admin" id="block" href="{{ route('superAdmin.subscriber.unblock', $subscriber[$i]['id']) }}"><i class="dw dw-eye" ></i> Unblock</a>
                                                    @else
                                                    @endif
                                                    <a class="dropdown-item"
                                                        href="{{ route('superAdmin.subscriber.destroy', $subscriber[$i]['id']) }}"
                                                        id="delete"><i class="dw dw-eye"></i>
                                                        Delete</a>

                                                </div>
                                            </div>

                                        </td>

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
