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

<h1>Customers List</h1>

<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<ul>
				<li>
					<a href="/maintenance/maintain_customers/customer_accounts/create">Add Customer</a>
				</li>
				<li>
					<a href="/maintenance/maintain_customers/customer_accounts">View Customers</a>
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
					<td>Customer ID</td>
					<td>Customer Name</td>
					<td>Contact Number</td>
					<td>Address</td>
					<td>Customer Type ID</td>
					<td>Customer Type</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($customers as $key => $value)
					<tr>
						<td>{{ $value->customer_id }}</td>
						<td>{{ $value->customer_name }}</td>
						<td>{{ $value->contact_number}}</td>
						<td>{{ $value->address }}</td>
						<td>{{ $value->customer_type_id }}</td>
						<td>{{ $value->customer_type }}</td>
						<td>
							<!-- delete the customer -->
							{{ Form::open(
								array(
									'url' => 'maintenance/maintain_customers/customer_accounts/' . $value->log,
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
							<!-- show the customer -->
							<a href="{{ URL::to('maintenance/maintain_customers/customer_accounts/' . $value->log) }}" class="btn btn-success">Show this account</a>
							<a href="{{ URL::to('maintenance/maintain_customers/customer_accounts/' . $value->log) . '/edit' }}" class="btn btn-info">Edit this account</a>
							
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop