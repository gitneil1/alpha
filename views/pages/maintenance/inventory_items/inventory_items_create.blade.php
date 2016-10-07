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

<h1>Create Inventory Item</h1>
<ul>
	<p>Accounts</p>
<ul>
	<li><a href="/maintenance/maintain_inventory_items/inventory_items/create">Add Inventory Items</a></li>
	<li><a href="/maintenance/maintain_inventory_items/inventory_items/">View Inventory Items</a></li>
</ul>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => '/maintenance/maintain_inventory_items/inventory_items/')) }}
	<div class="form-group">
		{{ Form::label('inventory_item_id', 'Inventory Item ID') }}
		{{ Form::text('inventory_item_id', Input::old('inventory_item_id'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('inventory_item_class', 'Inventory Item Class') }}
		{{ Form::text('inventory_item_class', Input::old('inventory_item_class'),
			array('class' => 'form-control'))
		}}
	</div>
	{{ Form::submit('Save Inventory Item!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() }}

@stop