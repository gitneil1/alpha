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

<h1>Cost Center List</h1>

<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<ul>
				<li>
					<a href="/maintenance/maintain_cost_center/create">Add Cost Center</a>
				</li>
				<li>
					<a href="/maintenance/maintain_cost_center">View Cost Center</a>
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
					<td>Cost Center ID</td>
					<td>Cost Center Name</td>
					<td>Status</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cost_centers as $key => $value)
				<tr>
					<td>{{ $value->cost_center_id }}</td>
					<td>{{ $value->cost_center_name }}</td>
					<td>{{ $value->status }}</td-->
					<td>
						<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id}) -->
						{{ Form::open(
							array(
								'url' => 'maintenance/maintain_cost_center/' . $value->id,
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
							<a href="{{ URL::to('maintenance/maintain_cost_center/' . $value->id) }}" class="btn btn-success">Show this type</a>
							<a href="{{ URL::to('maintenance/maintain_cost_center/' . $value->id) . '/edit' }}" class="btn btn-info">Edit this type</a>
						</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop