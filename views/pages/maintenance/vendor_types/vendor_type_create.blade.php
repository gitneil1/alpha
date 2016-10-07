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

<h1>Create Vendor Type</h1>
<ul>
	<li>
		<a href="/maintenance/maintain_vendors/vendor_types/create">Add Vendor Type</a>
	</li>
	<li>
		<a href="/maintenance/maintain_vendors/vendor_types">View Vendor Types</a>
	</li>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => '/maintenance/maintain_vendors/vendor_types/')) }}
	<div class="form-group">
		{{ Form::label('vendor_type_name', 'Vendor Type Name') }}
		{{ Form::text('vendor_type_name', Input::old('vendor_type_name'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('vendor_type_code', 'Vendor Type Code') }}
		{{ Form::text('vendor_type_code', Input::old('vendor_type_code'),
			array('class' => 'form-control'))
		}}
	</div>
	{{ Form::submit('Save Vendor Type!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() }}

@stop