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
        <a href="/maintenance/maintain_cost_center/create">Add Cost Center</a>
    </li>
    <li>
        <a href="/maintenance/maintain_cost_center">View Cost Center</a>
    </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h2>
        <strong>Cost Center ID:</strong> {{ $cost_center->cost_center_id }}
        </h2>
        <p>Cost Center Name: {{ $cost_center->cost_center_name }}</p>
        <p>Status: {{ $cost_center->status }}</p>
        
    </div>

</div>
@stop