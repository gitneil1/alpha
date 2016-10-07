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

<h1>Create Customer Type</h1>
<ul>
	<li><a href="/maintenance/maintain_customers/customer_accounts/create">Add Customer</a></li>
	<li><a href="/maintenance/maintain_customers/customer_types">View Customers</a></li>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => '/maintenance/maintain_customers/customer_types/')) }}
	<div class="form-group">
		{{ Form::label('customer_type_name', 'Customer Type Name') }}
		{{ Form::text('customer_type_name', Input::old('customer_type_name'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('customer_type_code', 'Customer Type Code') }}
		{{ Form::text('customer_type_code', Input::old('customer_type_code'),
			array('class' => 'form-control'))
		}}
	</div>
	{{ Form::submit('Save Customer Type!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() }}

@stop