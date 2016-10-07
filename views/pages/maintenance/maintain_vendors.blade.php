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
Maintenance Vendor Page
<p>Accounts</p>
<ul>
	<li><a href="/maintenance/maintain_vendors/vendor_accounts/create">Add Vendor</a></li>
	<li><a href="/maintenance/maintain_vendors/vendor_accounts">View Vendors</a></li>
</ul>
<p>Vendor Types</p>
<ul>
	<li><a href="/maintenance/maintain_vendors/vendor_types/create">Add Vendor Type</a></li>
	<li><a href="/maintenance/maintain_vendors/vendor_types">View Vendor Types</a></li>
</ul>
@stop