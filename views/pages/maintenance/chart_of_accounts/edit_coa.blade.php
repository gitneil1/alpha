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

    <h1>Edit Account ID:{{ $chart_of_account->id }}</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    {{ Form::model($chart_of_account, array(
        'route' => array(
                    'chart_of_accounts.update', $chart_of_account->id),
        'method' => 'PUT')
    )}}
        <div class="form-group">
            {{ Form::label('account_id', 'Account ID') }}
            {{ Form::text('account_id', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        <div class="form-group">
            {{ Form::label('account_description', 'Account Description') }}
            {{ Form::text('account_description', null, array(
                'class' => 'form-control'
            ))  }}
        </div>
        <div class="form-group">
            {{ Form::label('account_type', 'Account Type') }}
            {{ Form::select('account_type',
            $chart_of_account_types,
            null,
            array('class' => 'form-control')
            )}}
        </div>
        {{ Form::submit('Edit the Account', array(
            'class' => 'btn btn-primary'
            ))}}
    {{ Form::close() }}

</div>
@stop