@extends('layout')

@section('content')

    @include('partials.navbar')
    @include('partials.superAdmin_sidebar')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Edit Admin</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>


                <div class="pd-20 card-box mb-30">

                    <div class="clearfix">
                        <h4 class="text-blue h4">Add Admin </h4>

                    </div>


                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach ($errors->all() as $err)

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Warning!</strong> {{ $err }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label>Image</label>
                            {{-- <input type="file"
                                class="form-control-file form-control height-auto" name="image">
                            --}}
                            <img src=" {{ asset($image) }}" onclick="triggerClick()" id="profileDisplay" class="center"
                                style="width: 15rem; height: 15rem;display: block;border-radius:50%; margin-left: auto; margin-right: auto;"><br>
                            <input type="file" class="form-control-file form-control height-auto" name="image"
                                accept="image/*" onchange="displayImage(this)" id="file" style="display:none;">
                                <input type="text" class=" form-control" name="old_image" style="display:block" value="{{$image}}">

                        </div>
                        <div class="form-group" style="display: none;">

                            <input class="form-control" type="text" value="{{ $type }}" name="type" readonly>
                        </div>

                        <div class="form-group">
                            {{-- <label>Name</label> --}}
                            <input class="form-control" placeholder="Name" type="text" name="name" value="{{ $Name }}">
                        </div>
                        {{-- <div class="form-group">

                            <input class="form-control" type="text" placeholder="User Name" id="unamecreate"
                                value="{{ $username }}" name="username">
                            <div id="alert">

                            </div>
                        </div> --}}
                        <div class="form-group">
                            {{-- <label>Mobile</label> --}}
                            <input class="form-control" placeholder="Mobile Number" type="number" name="mobile"
                                value="{{ $Mobile }}">
                        </div>
                        <div class="form-group">
                            {{-- <label>Email</label> --}}
                            <input class="form-control" placeholder="Email" type="email" name="email" value="{{ $Email }}">
                        </div>
                        <div class="form-group">
                            {{-- <label>Gender</label> --}}
                            <select class="form-control" name="gender">
                                <option selected value="{{ $Gender }}">{{ $Gender }}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            {{-- <label>Address</label> --}}
                            <textarea class="form-control" placeholder="Address" name="address">{{ $Address }}</textarea>
                        </div>





                        <input type="submit" class="btn btn-outline-success btn-lg btn-block" id=btn_insert name="infoUpdate" value="Insert">

                    </form>



                </div>
            </div>
        </div>
    </div>

@endsection
