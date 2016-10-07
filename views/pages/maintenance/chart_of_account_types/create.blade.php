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

<h1>Create a chart of account type</h1>
<ul>
	<li>
		<a href="{{ URL::to('chart_of_account_types/create') }}">Add Chart of Account Type</a>
	</li>
	<li>
		<a href="/chart_of_account_types">View Chart of Account Types</a>
	</li>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'chart_of_account_types')) }}
	<div class="form-group">
		{{ Form::label('account_type', 'Account ID') }}
		{{ Form::text('account_type', Input::old('account_type'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('account_type_name', 'Account Type') }}
		{{ Form::text('account_type_name', Input::old('account_type_name'),
			array('class' => 'form-control'))
		}}
	</div>
	{{ Form::submit('Save Type!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() }}

@stop