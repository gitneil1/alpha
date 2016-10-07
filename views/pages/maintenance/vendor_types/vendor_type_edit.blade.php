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

    <h1>Edit Vendor Type:{{ $vendor_type->vendor_type_name }}</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    {{ Form::model($vendor_type, array(
        'route' => array(
                    'vendor_types.update', $vendor_type->id),
        'method' => 'PUT')
    )}}
        <div class="form-group">
            {{ Form::label('vendor_type_code', 'Vendor Type Code') }}
            {{ Form::text('vendor_type_code', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        <div class="form-group">
            {{ Form::label('vendor_type_name', 'Vendor Type Name') }}
            {{ Form::text('vendor_type_name', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        
        {{ Form::submit('Edit the Vendor Type', array(
            'class' => 'btn btn-primary'
            ))}}
    {{ Form::close() }}

</div>
@stop