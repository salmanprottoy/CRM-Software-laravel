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
                    {{-- <li><a href="register.html">Register</a></li>
                    --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            {{-- <div class="row align-items-center">Package List</div>
            --}}
            <div class="row align-items-center">

                @for ($i = 0; $i < count($package); $i++)
                    <div class="col-md-4 mb-30">
                        <div class="card-box pricing-card-style2">
                            <div class="pricing-card-header">
                                <div class="left">
                                    <h5>Standard</h5>
                                    <p>For small businesses</p>
                                </div>
                                <div class="right">
                                    <div class="pricing-price">
                                        €100<span>/month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-card-body">
                                <div class="pricing-points">
                                    <ul>
                                        <li>{{ $package[$i]['s1'] }}</li>
                                        <li>{{ $package[$i]['s2'] }}</li>
                                        <li>{{ $package[$i]['s3'] }}</li>
                                        <li>{{ $package[$i]['s4'] }}</li>
                                        <li>{{ $package[$i]['s5'] }}</li>
                                        <li>{{ $package[$i]['s6'] }}</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="cta">
                                <a href="{{ route('getstarted.register', 'Standard') }}"
                                    class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-30">
                        <div class="card-box pricing-card-style2">
                            <div class="pricing-card-header">
                                <div class="left">
                                    <h5>Advance</h5>
                                    <p>For big businesses</p>
                                </div>
                                <div class="right">
                                    <div class="pricing-price">
                                        €150<span>/month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-card-body">
                                <div class="pricing-points">
                                    <ul>
                                        <li>{{ $package[$i]['a1'] }}</li>
                                        <li>{{ $package[$i]['a2'] }}</li>
                                        <li>{{ $package[$i]['a3'] }}</li>
                                        <li>{{ $package[$i]['a4'] }}</li>
                                        <li>{{ $package[$i]['a5'] }}</li>
                                        <li>{{ $package[$i]['a6'] }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cta">
                                <a href="{{ route('getstarted.register', 'Advance') }}"
                                    class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-30">
                        <div class="card-box pricing-card-style2">
                            <div class="pricing-card-header">
                                <div class="left">
                                    <h5>Enterprise</h5>
                                    <p>For enterprises</p>
                                </div>
                                <div class="right">
                                    <div class="pricing-price">
                                        €250<span>/month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-card-body">
                                <div class="pricing-points">
                                    <ul>
                                        <li>{{ $package[$i]['e1'] }}</li>
                                        <li>{{ $package[$i]['e2'] }}</li>
                                        <li>{{ $package[$i]['e3'] }}</li>
                                        <li>{{ $package[$i]['e4'] }}</li>
                                        <li>{{ $package[$i]['e5'] }}</li>
                                        <li>{{ $package[$i]['e6'] }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cta">
                                <a href="{{ route('getstarted.register', 'Enterprise') }}"
                                    class="btn btn-primary btn-rounded btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </div>
@endsection
