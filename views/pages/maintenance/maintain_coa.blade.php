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
Maintain COA Page
@if(\Session::has('message'))
	<div class="alert alert-info">
		{{ \Session::get('message') }}
	</div>
@endif

<p>Accounts</p>
<ul>
	<li><a href="/chart_of_accounts/create">Add Chart of Accounts</a></li>
	<li><a href="/chart_of_accounts">View Chart of Accounts</a></li>
	
</ul>

<!-- Adding of Account Types -->
<p>Account Types</p>
<ul>
	<li><a href="/chart_of_account_types/create">Add Account Type</a></li>
	<li><a href="/chart_of_account_types">View Chart of Account Types</a></li>
</ul>

@stop