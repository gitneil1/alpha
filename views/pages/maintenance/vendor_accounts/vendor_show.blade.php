@extends('layouts.default')
@section('sidebar')
@include('includes.maintenance_module_links')
@stop
@section('content')
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <ul>
            <li>
                <a href="/maintenance/maintain_vendors/vendor_accounts/create">Add Vendor</a>
            </li>
            <li>
                <a href="/maintenance/maintain_vendors/vendor_accounts">View Vendors</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="jumbotron text-center">
        <table class="table table-striped table-bordered">
            <tr>
                <td>Vendor Id:</td>
                <td>{{$vendor->vendor_id}}</td>
            </tr>
            <tr>
                <td>Vendor name:</td>
                <td>{{ $vendor->vendor_name }}</td>
            </tr>
            <tr>
                <td>Account number:</td>
                <td>{{ $vendor->account_number }}</td>
            </tr>
            <tr>
                <td>Expense account:</td>
                <td>{{ $vendor->expense_account }}</td>
            </tr>
            <tr>
                <td>Vendor Type:</td>
                <td>{{ $vendor->vendor_type_id  }}</td>
            </tr>
        </table>
        <!--<h2><strong>Vendor ID:</strong> {{ $vendor->vendor_id }}</h2>
        <p>
            <strong>Vendor name:</strong> {{ $vendor->vendor_name }}<br>
            <strong>Contact number:</strong> {{ $vendor->contact_number }}<br>
            <strong>Account number:</strong> {{ $vendor->account_number }}<br>
            <strong>Vendor Type ID:</strong> {{ $vendor->vendor_type_id  }}<br>
            <strong>Vendor Type:</strong> {{ $vendor->vendor_type }}<br>
        </p>-->
    </div>

</div>
@stop