@extends('layout')

@section('content')

    @include('partials.navbar')
    @include('partials.superAdmin_sidebar')

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>pricing Table</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                <li class="breadcrumb-item active" aria-current="page">pricing Table
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>



            <h4 class="mb-30 mt-30 text-blue h4">Pricing Table Style </h4>




            <form method="POST">
@csrf
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


                    @for ($i = 0; $i < count($package); $i++)

                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['s1']}}" name="s6">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['s2']}}" name="s5">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['s3']}}" name="s4">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['s4']}}" name="s3">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['s5']}}" name="s2">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['s6']}}" name="s1">
                    </div>






                    <div class="left">
                        <h5>Advance</h5>
                        <p>For big businesses</p>
                    </div>
                    <div class="right">
                        <div class="pricing-price">
                            €150<span>/month</span>
                        </div>
                    </div>



                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['a1']}}" name="a6">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['a2']}}" name="a5">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['a3']}}" name="a4">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['a4']}}" name="a3">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['a5']}}" name="a2">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['a6']}}" name="a1">
                    </div>




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



                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['e1']}}" name="e1">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['e2']}}" name="e2">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['e3']}}" name="e3">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['e4']}}" name="e4">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['e5']}}" name="e5">
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ $package[$i]['e6']}}" name="e6">
                    </div>


                    <input type="submit" class="btn btn-outline-success btn-lg btn-block" id=btn_insert name="infoUpdate" value="Update">
                    @endfor

                </div>



            </form>

        </div>
    </div>

</div>
</div>
</div>
@endsection