@extends('layouts.default')

@section('sidebar')
@include('includes.inventory_module_links')
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="/css/purchase_orders-style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<h1>Test Relationship Page </h1>
<p>User ID 1 with phone: {{ $phone->name }}</p>
<p>Phone ID 2 belongs to {{ $user->name }}</p>
<hr>
<p>Chart account id: 5 {{ $chart->account_id }} </p>
<!--p>ChartOfAccount id: 5 type is {{ $chart_of_account_type->account_type_name }}</p-->
@stop