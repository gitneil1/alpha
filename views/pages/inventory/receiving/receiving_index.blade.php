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

<h1>Receiving Inventory</h1>
<ul>
	<li>
					<a href="/inventory/purchase_order/create">Create PO</a>
				</li>
				<li>
					<a href="/inventory/purchase_order">View PO List</a>
				</li>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'chart_of_account_types')) }}
	<div class="form-group">
		{{ Form::label('po_num', 'PO num') }}
		{{ Form::text('po_num', Input::old('po_num'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('vendor_id', 'dropdown vendor_id') }}
		{{ Form::text('vendor_id', Input::old('vendor_id'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('po_date', 'po_date') }}
		{{ Form::text('po_date', Input::old('po_date'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('po_till_date', 'po_till_date') }}
		{{ Form::text('po_till_date', Input::old('po_till_date'),
			array('class' => 'form-control'))
		}}
	</div>
	<div>PO items</div>
	<div class="form-group">
		{{ Form::label('qty', 'qty') }}
		{{ Form::text('qty', Input::old('qty'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('inventory_id', 'dropdown inventory_id') }}
		{{ Form::text('inventory_id', Input::old('inventory_id'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('unit_price', 'unit_price') }}
		{{ Form::text('unit_price', Input::old('unit_price'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('vat', 'vat') }}
		{{ Form::text('vat', Input::old('vat'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('cost_center_id', 'dropdown cost_center_id') }}
		{{ Form::text('cost_center_id', Input::old('cost_center_id'),
			array('class' => 'form-control'))
		}}
	</div>
	{{ Form::submit('Save PO!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() }}

@stop