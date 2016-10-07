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

<h1>Create PO</h1>
<ul>
	<li>
					<a href="/inventory/purchase_order/create">Create PO</a>
				</li>
				<li>
					<a href="/inventory/purchase_order">View PO List</a>
				</li>
</ul>
<hr/>

<div class="po_form">

	{{ HTML::ul($errors->all()) }}

	{{ Form::open(array('url' => 'inventory/purchase_order')) }}
	
	

	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
			{{ Form::label('vendor_id', 'Vendor ID') }}
				{{ Form::select('vendor_id', $vendor_id,
			Input::old('vendor_id'),
			array('class' => 'form-control')
		) }}
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label for="client_name">PO number</label>
				{{ Form::text('po_num', Input::old('po_num'))
		}}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				<label for="date_needed">PO Date</label>
				<input type="date" class="form-control" id="po_date" name="po_date" min="" value="" required>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label for="date_needed">Good thru</label>
				<input type="date" class="form-control" id="po_till_date" name="po_till_date" min="" value="" required>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				<label for="client_name">Terms</label>
				<input type="text" class="form-control" id="terms" name="terms" value="" required>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label for="client_name">Status</label>
				<input type="text" class="form-control" id="status" name="status" value="" required>
			</div>
		</div>
	</div>
	<button type="button" class="home-button-link" id="btnAddItem">
		<i class="fa fa-plus-circle"></i> Add Item
	</button>
	
	<div class="row">
	<div class="col-lg-12">
		<table class="table">
			<thead>
				<tr>
					<th>Qty</th>
					<th>inventory id</th>
					<th>unit price</th>
					<th>vat</th>
					<th>cost center id</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@include("pages.inventory.po._partials.po_form")
			</tbody>
		</table>
		{{ Form::submit('Save PO!', array(
		'class' => 'btn btn-primary'
	)) }}
	</div>
	{{ Form::close() }}
</div>

</div>
<!-- if there are creation errors, they will show here -->
{{-- HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'inventory/purchase_order')) }}
	<div class="form-group">
		{{ Form::label('po_num', 'PO num') }}
		{{ Form::text('po_num', Input::old('po_num'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('vendor_id', 'Vendor ID') }}
		{{ Form::select('vendor_id', $vendor_id,
			Input::old('vendor_id'),
			array('class' => 'form-control')
		) }}
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
	<div class="form-group">
		{{ Form::label('terms', 'Terms') }}
		{{ Form::text('terms', Input::old('terms'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('status', 'Status') }}
		{{ Form::text('status', Input::old('status'),
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
		{{ Form::label('inventory_id', 'Inventory ID') }}
		{{ Form::select('inventory_id', $inventory_id,
			Input::old('inventory_id'),
			array('class' => 'form-control')
		) }}
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
		{{ Form::label('cost_center_id', 'Cost Center ID') }}
		{{ Form::select('cost_center_id', $cost_center_id,
			Input::old('cost_center_id'),
			array('class' => 'form-control')
		) }}
	</div>
	{{ Form::submit('Save PO!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() --}}

<script src="/js/addItem.js"></script>
@stop