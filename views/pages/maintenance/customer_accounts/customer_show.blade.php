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
                <a href="/maintenance/maintain_customers/customer_accounts/create">Add customer</a>
            </li>
            <li>
                <a href="/maintenance/maintain_customers/customer_accounts">View customers</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="jumbotron text-center">
        <h2><strong>Customer ID:</strong> {{ $customer->customer_id }}</h2>
        <p>
            <strong>Customer name:</strong> {{ $customer->customer_name }}<br>
            <strong>Contact number:</strong> {{ $customer->contact_number }}<br>
            <strong>Address:</strong> {{ $customer->address }}<br>
            <strong>Customer Type ID:</strong> {{ $customer->customer_type_id  }}<br>
            <strong>Customer Type:</strong> {{ $customer->customer_type }}<br>
        </p>
    </div>

</div>
@stop