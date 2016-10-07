@extends('layouts.default')
@section('sidebar')
@include('includes.sales_module_links')
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="/css/purchase_orders-style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
Sales Invoice Page

<div class="from_suppliers col-lg-4">
	<a href="/sales_supplier_invoice" target="iframe_a">Dropbox</a>
</div>
<div class="invoice_file col-lg-8">
	<iframe width="100%" src="" name="iframe_a"></iframe>
</div>

<iframe height="300px" width="100%" src="" name="iframe_a"></iframe>

<p><a href="http://www.w3schools.com" target="iframe_a">W3Schools.com</a></p>

<p>When the target of a link matches the name of an iframe, the link will open in the iframe.</p>

<!--form action="accounting_maintenance_vendors_add.php" method="POST">

<table class="table table-condensed table-hover table-striped table-bordered">
<tr >
<td style="text-align:left">Name</td>
<td>
	<input class="form-control" type="text" maxlength="100" required name="contact" style='text-transform:uppercase' required/>
</td>
</tr>
<tr>
<td style="text-align:left">Address</td>
<td><input class="form-control" type="text" maxlength="100" required name="contact" style='text-transform:uppercase' required/></td>
</tr>
<tr>
<td style="text-align:left">Phone</td>
<td><input class="form-control" type="text" maxlength="100" required name="address_line_one" style='text-transform:uppercase' /></td>
</tr>
<tr>
<td style="text-align:left">Fax</td>
<td><input class="form-control" type="text" maxlength="100" required name="address_line_two" style='text-transform:uppercase'/></td>
</tr>
<tr>
<td style="text-align:left">Email</td>
<td><input class="form-control" type="text" maxlength="100" required name="city" style='text-transform:uppercase'/></td>
</tr>
<tr>
<td style="text-align:left">Country</td>
<td><input class="form-control" type="text" maxlength="100" required name="country" style='text-transform:uppercase'/></td>
</tr>

</table>

<p style="text-align:center">
<input  type="submit" value="Save" name="submit" />
</p>
</form-->
@stop