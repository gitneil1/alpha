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

<h1>Add customer </h1>
<ul>
	<li>
		<a href="/maintenance/maintain_customers/customer_types/create">Add customer Type</a>
	</li>
	<li>
		<a href="/maintenance/maintain_customers/customer_types">View customer Types</a>
	</li>
</ul>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::model($customer, array(
        'route' => array(
                    'customer_accounts.update', $customer->log),
        'method' => 'PUT')
    )}}
	<div class="form-group">
		{{ Form::label('customer_id', 'Customer ID') }}
		{{ Form::text('customer_id', Input::old('customer_id'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('customer_name', 'Customer Name') }}
		{{ Form::text('customer_name', Input::old('customer_name'),
			array('class' => 'form-control'))
		}}
	</div>
	
	<div class="form-group">
		{{ Form::label('account_number', 'Account Number') }}
		{{ Form::text('account_number', Input::old('account_number'),
			array('class' => 'form-control'))
		}}
	</div>
	
	<div class="form-group">
		{{ Form::label('expense_account', 'Expense Account') }}
		{{ Form::select('expense_account', $chart_of_account_types,
			Input::old('expense_account'),
			array('class' => 'form-control')
		) }}
	</div>
	<div class="form-group">
		{{ Form::label('customer_type_id', 'Customer Type') }}
		{{ Form::select('customer_type_id', $customer_types,
			Input::old('customer_type_id'),
			array('class' => 'form-control')
		) }}
	</div>
	<div class="form-group">
		{{ Form::label('address_street', 'Street') }}
		{{ Form::text('address_street', Input::old('address_street'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('address_city', 'City') }}
		{{ Form::text('address_city', Input::old('address_city'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('address_province', 'Province') }}
		{{ Form::text('address_province', Input::old('address_province'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('address_zip', 'Zip') }}
		{{ Form::text('address_zip', Input::old('address_zip'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('address_country', 'Country') }}
		{{ Form::text('address_country', Input::old('address_country'),
			array('class' => 'form-control'))
		}}
	</div>
	
	<div class="form-group">
		{{ Form::label('contact_mobile', 'Mobile') }}
		{{ Form::text('contact_mobile', Input::old('contact_mobile'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('contact_landline', 'Landline') }}
		{{ Form::text('contact_landline', Input::old('contact_landline'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('contact_email', 'E-mail') }}
		{{ Form::text('contact_email', Input::old('contact_email'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('contact_website', 'Website') }}
		{{ Form::text('contact_website', Input::old('contact_website'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('contact_fax', 'Fax') }}
		{{ Form::text('contact_fax', Input::old('contact_fax'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('contact_person', 'Contact Person') }}
		{{ Form::text('contact_person', Input::old('contact_person'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('contact_role', 'Contact Role') }}
		{{ Form::text('contact_role', Input::old('contact_role'),
			array('class' => 'form-control'))
		}}
	</div>
	<div class="form-group">
		{{ Form::label('status', 'Status') }}
		{{ Form::text('status', Input::old('status'),
			array('class' => 'form-control'))
		}}
	</div>
	{{ Form::submit('Save Customer!', array(
		'class' => 'btn btn-primary'
	)) }}
{{ Form::close() }}


@stop