@extends('layout')
@section('content')
@include('partials.navbar')
@include('partials.accountingSells_sidebar')
<div class="main-container">
    <form method="post">
        @csrf
        <legend>Delete Customer</legend>
        <div class="card-box mb-30">
            <div class="pb-20">
                <table class="table hover multiple-select-row data-table-export nowrap" id="table">
                    <tr>
                        <td>Customer Name  :</td>
                        <td>{{$customerName}}</td>
                    </tr>
                    <tr>
                        <td>Contact Number :</td>
                        <td>{{$customerContactNumber}}</td>
                    </tr>
                    <tr>
                        <td>Address :</td>
                        <td>{{$customerAddress}}</td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td>{{$customerEmail}}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>{{$customerStatus}}</td>
                    </tr>
                    <tr>
                        <td>Gender :</td>
                        <td>{{$customerGender}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div>
            <h3>Are you sure?</h3>
            <br>
        <input class="btn btn-outline-danger" type="submit" name="submit" value="Confirm">
        </div>
    </form>
</div> 
@endsection