@extends('layouts.default')
@section('sidebar')
@include('includes.maintenance_module_links')
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="/css/purchase_orders-style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<h1>Create cost center</h1>
<ul>
	<li>
		<a href="/maintenance/maintain_cost_center/create">Add Cost Center</a>
	</li>
	<li>
		<a href="/maintenance/maintain_cost_center">View Cost Center</a>
	</li>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => '/maintenance/maintain_cost_center')) }}
	<div class="form-group">
		{{ Form::label('cost_center_id', 'Cost Center ID') }}
		{{ Form::text('cost_center_id', Input::old('cost_center_id'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('cost_center_name', 'Cost Center Name') }}
		{{ Form::text(
			'cost_center_name', Input::old('cost_center_name'),
			array('class' => 'form-control')
		) }}
	</div>
	<div class="form-group">
		{{ Form::label('status', 'Status') }}
		{{ Form::text(
			'status', Input::old('status'),
			array('class' => 'form-control')
		) }}
	</div>
	{{ Form::submit('Save Account!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() }}

@stop