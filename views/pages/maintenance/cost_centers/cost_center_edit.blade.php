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

    <h1>Edit Cost Center:{{ $cost_center->id }}</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    {{ Form::model($cost_center, array(
        'route' => array(
                    'maintain_cost_center.update',
                    $cost_center->id),
                    'method' => 'PUT')
    )}}
        <div class="form-group">
            {{ Form::label('cost_center_id', 'Cost Center ID') }}
            {{ Form::text('cost_center_id', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        <div class="form-group">
            {{ Form::label('cost_center_name', 'Cost Center Name') }}
            {{ Form::text('cost_center_name', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::text('status', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        
        {{ Form::submit('Edit the Cost Center', array(
            'class' => 'btn btn-primary'
            ))}}
    {{ Form::close() }}

</div>
@stop