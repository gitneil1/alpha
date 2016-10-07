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

<h1>Inventory Items List</h1>

<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<ul>
				<li>
					<a href="/maintenance/maintain_inventory_items/inventory_items/create">Add Inventory Item</a>
				</li>
				<li>
					<a href="/maintenance/maintain_inventory_items/inventory_items/">View Inventory Items List</a>
				</li>
			</ul>
		</div>
	</nav>
		
		<!-- will be used to show any message -->
		@if(\Session::has('message'))
			<div class="alert alert-info">
				{{ \Session::get('message') }}
			</div>
		@endif
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>Inventory Item ID</td>
					<td>Inventory Item Class</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($inventory_items as $key => $value)
					<tr>
						<td>{{ $value->inventory_item_id }}</td>
						<td>{{ $value->inventory_item_class }}</td>
						<td>
							

							<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id}) -->
							{{ Form::open(
								array(
									'url' => '/maintenance/maintain_inventory_items/inventory_items/' . $value->log,
									'class' => 'pull-right'
								)
							)}}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit(
								'Delete',
								array(
									'class' => 'btn btn-warning'
								)
							)}}
							{{ Form::close() }}
							<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
							<a href="{{ URL::to('maintenance/maintain_inventory_items/inventory_items/' . $value->log) }}" class="btn btn-success">Show this item</a>
							<a href="{{ URL::to('maintenance/maintain_inventory_items/inventory_items/' . $value->log) . '/edit' }}" class="btn btn-info">Edit this item</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop