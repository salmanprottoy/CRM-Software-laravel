@extends('layout')

@section('content')
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="../assets/vendors/images/deskapp-logo.svg" alt="">

                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">

                    <img src="../assets/vendors/images/register-page-img.png" alt="">

                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Register as Manager</h2>
                        </div>

                        <form method="POST">
                            @csrf
                            @foreach ($errors->all() as $err)

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Warning!</strong> {{ $err }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                            <div class="input-group custom" style="display:none">
                                <input type="text" class="form-control form-control-lg" value="Manager" name="type"
                                    readonly>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Transaction ID"
                                    name="tran_id" id="tran_id">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                <div id="tran_alert">

                                </div>
                            </div>
                            {{-- <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Manager Name"
                                    name="cmname" id="commname">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                <div id="payment">

                                </div>
                            </div> --}}
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username"
                                    name="username" id="unamecreate">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                <div id="alert">

                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    name="password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">


                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">

                                        <!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
                                        <!-- <input type="button" type="submit" value="Log In"> -->
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Login in
                                            your Account</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {


            $("#unamecreate").focus(function() {

                $('#alert').html("");
            });

            $('#unamecreate').focusout(function() {
                var username = $("#unamecreate").val();
                // alert("hi");
                $.ajax({
                    method: 'get',

                    url: "{{ route('register.uname.search') }}",
                    dataType: 'json',
                    data: {
                        search: username
                    },

                    success: function(response) {
                        //alert('asdfafdfd');
                        if (response != "") {
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
            $("#tran_id").focus(function() {

                $('#tran_alert').html("");
            });

            $('#tran_id').focusout(function() {
                var username = $("#tran_id").val();
                // alert("hi");
                $.ajax({
                    method: 'get',

                    url: "{{ route('register.tran_id.search') }}",
                    dataType: 'json',
                    data: {
                        search: username
                    },

                    success: function(response) {
                        //alert('asdfafdfd');
                        if (response == "") {
                            var alert =
                                " <div class='alert alert-warning alert-dismissible fade show' role='alert'>"
                            alert += "<strong>Warning!</strong> Transaction id already taken"
                            alert +=
                                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                            alert += " <span aria-hidden='true'>&times;</span>"
                            alert += " </button>"
                            alert += "</div>"

                            $('#tran_alert').html(alert);
                            $("#tran_id").val("");
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
    <script>
        $(document).ready(function() {
            $("#commname").focus(function() {

                $('#payment').html("");
            });

            $('#commname').focusout(function() {
                var username = $("#commname").val();
                //  alert("hi");
                $.ajax({
                    method: 'get',

                    url: "{{ route('register.manager.search') }}",
                    dataType: 'json',
                    data: {
                        search: username
                    },

                    success: function(response) {
                        //alert(response);
                        if (response == "") {
                            var alert =
                                " <div class='alert alert-warning alert-dismissible fade show' role='alert'>"
                            alert += "<strong>Warning!</strong> Wrong Manager Name"
                            alert +=
                                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
                            alert += " <span aria-hidden='true'>&times;</span>"
                            alert += " </button>"
                            alert += "</div>"

                            $('#payment').html(alert);
                            $("#commname").val("");
                        } else {
                            alert('asdfafdfd');
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
