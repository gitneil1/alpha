@extends('layouts.default')
@section('sidebar')
<nav class="sidebar-links">
	<b>Maintenance</b>
	<ul>
		<li><a href="/maintain_coa">Chart of Accounts</a></li>
		<li><a href="/maintain_users">Users</a></li>
	</ul>
</nav>
<!-- @include('includes.general_journal_entries_module_links')-->
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="/css/purchase_orders-style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
General Journal Entries Maintenance Page

@stop