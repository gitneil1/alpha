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
                    <a href="/maintenance/maintain_customers/customer_types/create">Add Customer Types</a>
                </li>
                <li>
                    <a href="/maintenance/maintain_customers/customer_types">View Customer Types</a>
                </li>
            </ul>
        </div>
    </nav>

    <h1>Edit Customer Type:{{ $customer_type->customer_type_name }}</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    {{ Form::model($customer_type, array(
        'route' => array(
                    'customer_types.update', $customer_type->id),
        'method' => 'PUT')
    )}}
        <div class="form-group">
            {{ Form::label('customer_type_code', 'Customer Type Code') }}
            {{ Form::text('customer_type_code', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        <div class="form-group">
            {{ Form::label('customer_type_name', 'Customer Type Name') }}
            {{ Form::text('customer_type_name', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        
        {{ Form::submit('Edit the customer Type', array(
            'class' => 'btn btn-primary'
            ))}}
    {{ Form::close() }}

</div>
@stop