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

<h1>Create Inventory</h1>
<ul>
	<p>Accounts</p>
<ul>
	<li><a href="/maintenance/maintain_inventory_items/inventory_items/create">Add Inventory Items</a></li>
	<li><a href="/maintenance/maintain_inventory_items/inventory_items/">View Inventory Items</a></li>
</ul>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => '/maintenance/maintain_inventory_items/inventory/')) }}
	<div class="form-group">
		{{ Form::label('inventory_id', 'Inventory ID') }}
		{{ Form::text('inventory_id', Input::old('inventory_id'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('inventory_description', 'Inventory Description') }}
		{{ Form::text('inventory_description', Input::old('inventory_description'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('inventory_item_id', 'Inventory Item ID') }}
		{{ Form::select('inventory_item_id', $inventory_items,
			Input::old('inventory_item_id'),
			array('class' => 'form-control')
		) }}
	</div>
	<div class="form-group">
		{{ Form::label('gl_sales_account', 'GL Sales Account') }}
		{{ Form::select('gl_sales_account', $chart_of_accounts,
			Input::old('gl_sales_account'),
			array('class' => 'form-control')
		) }}
	</div>
	<div class="form-group">
		{{ Form::label('gl_inventory_account', 'GL Inventory Account') }}
		{{ Form::select('gl_inventory_account', $chart_of_accounts,
			Input::old('gl_inventory_account'),
			array('class' => 'form-control')
		) }}
	</div>
	<div class="form-group">
		{{ Form::label('gl_cost_of_sales_account', 'GL Sales Account') }}
		{{ Form::select('gl_cost_of_sales_account', $chart_of_accounts,
			Input::old('gl_cost_of_sales_account'),
			array('class' => 'form-control')
		) }}
	</div>
	<div class="form-group">
		{{ Form::label('status', 'Status') }}
		{{ Form::text('status', Input::old('status'),
			array('class' => 'form-control'))
		}}
	</div>
	{{ Form::submit('Save Inventory!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() }}

@stop