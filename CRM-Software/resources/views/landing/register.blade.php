@extends('layout')

@section('content')
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="/">
                    <img src="../assets/vendors/images/deskapp-logo.svg" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="register.html">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items">
                <div class="col-md-6 col-lg-7">
                    <div class="card-box">
                        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                @csrf
                                <div class="form-group" style="display:none">
                                    <label>Package</label>
                                    <input class="form-control" type="text" name="package" value="{{ $package }}">
                                </div>

                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input class="form-control" type="text" name="cname" value="{{ old('cname') }}">
                                </div>
                                <div class="form-group">
                                    <label>Company Email</label>
                                    <input class="form-control" placeholder="bootstrap@example.com" type="email"
                                        name="cemail">
                                </div>
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input class="form-control" type="number" name="cmobile">
                                </div>
                                <div class="form-group">
                                    <label>Total Employee</label>
                                    <input class="form-control" type="number" name="cemployee">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="caddress"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Manager Name</label>
                                    <input class="form-control" type="text" name="cmname">
                                </div>
                                <div class="form-group" style="display:none">

                                    <input class="form-control" type="text" name="package_price" id="package_price"
                                        value="">
                                    <input class="form-control" type="text" name="discount_price" id="discount_price"
                                        value="">
                                    <input class="form-control" type="text" name="total_price" id="total_price" value="">
                                    {{ $date = date('Y/m/d H:i:s') }}
                                    <input class="form-control" type="text" name="date" id="date" value="{{ $date }}">
                                </div>
                                <input type="submit" class="btn btn-outline-success btn-lg btn-block" id=btn_insert
                                    name="infoUpdate" value="Insert">

                        </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    {{-- <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To DeskApp</h2>
                        </div>
                        <form method="POST">

                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username"
                                    name="username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    name="password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
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
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To
                                            Create Account</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    <div class="card-box">
                        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                            @if (Session::has('coupon'))
                                <h3>*Coupon Applied</h3>
                            @else
                                <form action="{{ route('getstarted.coupon') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Coupon</label>
                                        <div class="row">

                                            <div class="col-md-8 col-lg-8">
                                                <input class="form-control" type="text" name="coupon" id="coupon">
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <input type="submit" class="btn btn-outline-success btn-block" id=btn_apply
                                                    name="apply" value="Apply">
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            @endif
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>

                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Package</h6>
                                        <small class="text-muted">Package Type:{{ $package }}</small>
                                    </div>
                                    @if ($package == 'Standard')
                                        <span class="text-muted price" id="price">500</span>
                                    @elseif($package == 'Advance')
                                        <span class="text-muted price" id="price">750</span>
                                    @else
                                        <span class="text-muted price" id="price">1000</span>
                                    @endif
                                    {{-- <span class="text-muted">BDT</span>
                                    --}}
                                </li>
                                @if (Session::has('coupon'))
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">Discount</h6>
                                            <small class="text-muted">Coupon:({{ Session::get('coupon')['coupon_name'] }})<a
                                                    href="{{ route('coupon.remove') }}"
                                                    class="btn btn-danger btn-sm">x</a></small>

                                        </div>
                                        <span class="text-muted"
                                            id="discount">{{ Session::get('coupon')['discount'] }}</span>
                                    </li>
                                @else
                                @endif

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (BDT)</span>
                                    <strong id="total"></strong>
                                </li>
                            </ul>
                            {{-- <input type="submit"
                                class="btn btn-outline-success  btn-lg btn-block" id=btn_insert name="infoUpdate"
                                value="Continue to Payment"> --}}
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>


    <script>
        $('#total').each(function() {
            var price = $("#price").html();
            //alert(price);
            var a = document.getElementById("discount");
            if (a) {
                var discount = $("#discount").html();
            } else {
                var discount = 0;
            }
            //alert(discount);
            var total = price - discount;
            //alert(total);
            $('#total').html(total + ' ' + 'BDT');
            $('#package_price').val(price);
            $('#discount_price').val(discount);
            $('#total_price').val(total);
        })

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
@endsection
