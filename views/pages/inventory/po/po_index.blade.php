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

<h1>Purchase Order List</h1>

<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<ul>
				<li>
					<a href="/inventory/purchase_order/create">Create PO</a>
				</li>
				<li>
					<a href="/inventory/purchase_order">View PO List</a>
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
					<td>PO Num</td>
					<td>Vendor ID</td>
					<td>Terms</td>
					<td>Status</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($po_list as $key => $val)
				<tr>
					<td>{{ $val->po_num }}</td>
					<td>{{ $val->vendor_id }}</td>
					<td>{{ $val->terms }}</td>
					<td>{{ $val->status }}</td>
					<td>
						<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id}) -->
						{{ Form::open(
							array(
								'url' => 'inventory/purchase_order/' . $val->log,
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
						<a href="{{ URL::to('inventory/purchase_order/' . $val->log) }}" class="btn btn-success">Show this PO</a>
						<a href="{{ URL::to('inventory/purchase_order/' . $val->log) . '/edit' }}" class="btn btn-info">Edit this PO</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop