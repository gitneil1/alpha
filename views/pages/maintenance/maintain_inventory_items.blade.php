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
Maintenance Inventory Items Page

@if(\Session::has('message'))
	<div class="alert alert-info">
		{{ \Session::get('message') }}
	</div>
@endif

<p>Accounts</p>
<ul>
	<li><a href="/maintenance/maintain_inventory_items/inventory_items/create">Add Inventory Items</a></li>
	<li><a href="/maintenance/maintain_inventory_items/inventory_items/">View Inventory Items</a></li>
</ul>

<!-- Adding of Account Types -->
<p>Account Types</p>
<ul>
	<li><a href="/maintenance/maintain_inventory_items/inventory/create">Add Inventory</a></li>
	<li><a href="/maintenance/maintain_inventory_items/inventory">View Chart Inventory</a></li>
</ul>
@stop