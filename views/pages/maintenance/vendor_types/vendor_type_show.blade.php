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
                    <a href="/maintenance/maintain_vendors/vendor_types/create">Add Chart of Account Types</a>
                </li>
                <li>
                    <a href="/maintenance/maintain_vendors/vendor_types">View Chart of Account Types</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h2>
            <strong>Vendor Type Code:</strong> 
            {{ $vendor_type->vendor_type_code }}
        </h2>
        <h2>
            <strong>Vendor Type Name:</strong>
            {{$vendor_type->vendor_type_name}}
        </h2>
        
    </div>

</div>
@stop