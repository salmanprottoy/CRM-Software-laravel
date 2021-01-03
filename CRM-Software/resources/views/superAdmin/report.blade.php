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
                                <h4 class="text-blue h4"> Admin List</h4>

                            </div>
                            <div class="pull-right">

                                {{-- <button type="button" class="btn btn-primary"><i
                                        class="icon-copy fa fa-download" aria-hidden="true"></i></button>
                                --}}
                                <a href="{{ route('report.download', 'income') }}" class="btn btn-primary"><i
                                        class="icon-copy fa fa-download" aria-hidden="true"></i></a>

                            </div>
                        </div>

                    </div>

                    <div class="pb-20">

                        <table class="table data-table  nowrap ">
                            <thead>
                                <tr>

                                    <th class="table-plus datatable-nosort">Year</th>
                                    <th>Month</th>
                                    <th>Income</th>




                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($orders); $i++)
                                    <tr>
                                        <td class="table-plus">{{ $orders[$i]['Year'] }}</td>


                                        <td>{{ $orders[$i]['Month'] }}</td>
                                        <td>{{ $orders[$i]['Income'] }}</td>




                                    </tr>
                                @endfor

                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4"> Admin List</h4>

                            </div>
                            <div class="pull-right">

                                <a href="{{ route('report.download', 'top10subs') }}" class="btn btn-primary"><i
                                        class="icon-copy fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="pb-20">

                        <table class="table data-table  nowrap ">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Name</th>
                                    <th>Income</th>


                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($top10subs); $i++)
                                    <tr>
                                        <td>{{ $top10subs[$i]['name'] }}</td>


                                        <td>{{ $top10subs[$i]['Income'] }}</td>




                                    </tr>
                                @endfor

                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="card-box mb-30">
                    <div class="pd-20">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4"> Admin List</h4>

                            </div>
                            <div class="pull-right">

                                <a href="{{ route('report.download', 'income') }}" class="btn btn-primary"><i
                                        class="icon-copy fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="pb-20">

                        <table class="table data-table  nowrap ">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Gender</th>

                                    <th class="datatable-nosort">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($admin); $i++)
                                    <tr>
                                        <td class="table-plus">{{ $admin[$i]['id'] }}</td>

                                        <td><img class="card-image" src="{{ asset($admin[$i]['image']) }}" alt="Wrong Path"
                                                style="display: flex;height: 100px; width: 100px;"></img>
                                        </td>
                                        <td>{{ $admin[$i]['Name'] }}</td>
                                        <td>{{ $admin[$i]['Mobile'] }}</td>
                                        <td>{{ $admin[$i]['Email'] }}</td>
                                        <td>{{ $admin[$i]['Gender'] }}</td>

                                        <td>


                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                                    <a class="dropdown-item edit_admin" id="{{ $admin[$i]['id'] }}"
                                                        href="{{ route('superAdmin.admin.show', $admin[$i]['id']) }}"><i
                                                            class="dw dw-eye"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('superAdmin.admin.destroy', $admin[$i]['id']) }}"
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
