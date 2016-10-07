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
                    <a href="/maintenance/maintain_customers/customer_types/create">Add Customer Type</a>
                </li>
                <li>
                    <a href="/maintenance/maintain_customers/customer_types">View Customer Types</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h2>
            <strong>Customer Type Code:</strong> 
            {{ $customer_type->customer_type_code }}
        </h2>
        <h2>
            <strong>Customer Type Name:</strong>
            {{$customer_type->customer_type_name}}
        </h2>
        
    </div>

</div>
@stop