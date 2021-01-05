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


                {{-- @foreach ($errors->all() as $err)

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> {{ $err }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach --}}

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
                                <h4 class="text-blue h4">Super Admin List</h4>

                            </div>
                            <div class="pull-right">

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#superAdmin_create"><i class="fa fa-user-plus"></i></button>

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
                                @for ($i = 0; $i < count($superAdmin); $i++)
                                    <tr>
                                        <td class="table-plus">{{ $superAdmin[$i]['id'] }}</td>

                                        <td><img class="card-image" src="{{ asset($superAdmin[$i]['image']) }}"
                                                alt="Wrong Path" style="display: flex;height: 100px; width: 100px;"></img>
                                        </td>
                                        <td>{{ $superAdmin[$i]['Name'] }}</td>
                                        <td>{{ $superAdmin[$i]['Mobile'] }}</td>
                                        <td>{{ $superAdmin[$i]['Email'] }}</td>
                                        <td>{{ $superAdmin[$i]['Gender'] }}</td>

                                        <td>


                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>

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
                    <form action="{{ route('superAdmin.superAdmin.create') }}" method="POST" enctype="multipart/form-data">
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
                            <img src='
                                        {{ asset('assets/uploads/user.jpg') }}
                                        ' onclick="triggerClick()" id="profileDisplay" class="center"
                                value="{{ old('image') }}" style="width: 15rem; height: 15rem;display: block;border-radius:50%; margin-left: auto;
                                        margin-right: auto;"><br>
                            <input type="file" class="form-control-file form-control height-auto" name="image"
                                accept=" image/*" value="{{ old('image') }}" onchange="displayImage(this)" id="file"
                                style="display:none;">

                        </div>
                        <div class="form-group" style="display: none;">
                            {{-- <label>UserType</label> --}}
                            <input class="form-control" type="text" value="Super Admin" name="type" readonly>
                        </div>

                        <div class="form-group">
                            {{-- <label>Name</label> --}}
                            <input class="form-control" placeholder="Name" type="text" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class=" form-group">
                            {{-- <label>Username</label> --}}
                            <input class="form-control" type="text" placeholder="User Name" id="unamecreate"
                                value="{{ old('username') }}" name=" username">
                            <div id="alert">

                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <label>Mobile</label> --}}
                            <input class="form-control" placeholder="Mobile Number" type="number" name="mobile"
                                value="{{ old('mobile') }}">
                        </div>
                        <div class=" form-group">
                            {{-- <label>Email</label> --}}
                            <input class="form-control" placeholder="Email" type="email" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            {{-- <label>Gender</label> --}}
                            <select class="form-control" name="gender">
                                <option disabled selected>
                                    @if (!empty(old('gender')))
                                        {{ old('gender') }}
                                    @else
                                        Choose Gender
                                    @endif
                                </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>

                            </select>
                        </div>
                        <div class="form-group">
                            {{-- <label>Address</label> --}}
                            <textarea class="form-control" placeholder="Address"
                                name="address">{{ old('address') }}</textarea>
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


    <script>
        function triggerClick() {
            document.querySelector('#file').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result)
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
        $(document).ready(function() {
            $("#unamecreate").focus(function() {

                $('#alert').html("");
            });
            $('#unamecreate').focusout(function() {
                var username = $("#unamecreate").val();
                // alert("hi");
                $.ajax({
                    method: 'get',

                    url: "{{ route('superAdmin.superAdmin.search') }}",
                    dataType: 'json',
                    data: {
                        search: username
                    },

                    success: function(response) {
                        //alert('asdfafdfd');
                        if (response.length != 0) {
                            var alert =
                                " <div class='alert alert-warning alert-dismissible fade show' role='alert'>"
                            alert += "<strong>Warning!</strong> Username already taken"
                            alert +=
                                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                            alert += " <span aria-hidden='true'>&times;</span>"
                            alert += " </button>"
                            alert += "</div>"

                            $('#alert').html(alert);
                            $("#unamecreate").val("");
                        } else {
                            //  alert('asdfafdfd');
                        }

                    },
                    error: function(error) {
                        alert("Error");
                    }

                });
            });
        })

    </script>

@endsection
