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

<h1>Create a chart of account</h1>
<ul>
	<li>
		<a href="/chart_of_accounts/create">Add Chart of Accounts</a>
	</li>
	<li>
		<a href="/chart_of_accounts">View Chart of Accounts</a>
	</li>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'chart_of_accounts')) }}
	<div class="form-group">
		{{ Form::label('account_id', 'Account ID') }}
		{{ Form::text('account_id', Input::old('account_id'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('account_description', 'Account Description') }}
		{{ Form::text(
			'account_description', Input::old('account_description'),
			array('class' => 'form-control')
		) }}
	</div>
	<div class="form-group">
		{{ Form::label('account_type', 'Account Type') }}
		{{ Form::select('account_type', $chart_of_account_types,
			Input::old('account_type'),
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