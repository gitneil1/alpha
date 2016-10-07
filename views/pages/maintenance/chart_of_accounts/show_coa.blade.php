@extends('layouts.default')
@section('sidebar')
@include('includes.maintenance_module_links')
@stop
@section('content')
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<div class="container">

<nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <ul>
                <li>
                    <a href="{{ URL::to('chart_of_accounts/create') }}">Add Chart of Accounts</a>
                </li>
                <li>
                    <a href="/chart_of_accounts">View Chart of Accounts</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h2><strong>Account ID:</strong> {{ $chart_of_account->account_id }}</h2>
        <p>
            <strong>Account Description:</strong> {{ $chart_of_account->account_description }}<br>
            <strong>Account Type:</strong> {{ $chart_of_account->account_type . ' - ' . $chart_of_account->account_type_name }}
        </p>
    </div>

</div>
@stop