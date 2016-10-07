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

<h1>Chart of Account Types List</h1>

<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<ul>
				<li>
					<a href="{{ URL::to('chart_of_account_types/create') }}">Add Chart of Account Type</a>
				</li>
				<li>
					<a href="/chart_of_account_types">View Chart of Account Types List</a>
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
					<td>Account Type</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($chart_of_account_types as $key => $value)
					<tr>
						<td>{{ $value->account_type . ' - ' . $value->account_type_name}}</td>
						
						<td>
							

							<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id}) -->
							{{ Form::open(
								array(
									'url' => 'chart_of_account_types/' . $value->id,
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
							<a href="{{ URL::to('chart_of_account_types/' . $value->id) }}" class="btn btn-success">Show this type</a>
							<a href="{{ URL::to('chart_of_account_types/' . $value->id) . '/edit' }}" class="btn btn-info">Edit this type</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@stop