@extends('layouts.default')

@section('sidebar')
@include('includes.inventory_module_links')
@stop

@section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
Inventory Receiving Page
<form action="accounting_maintenance_vendors_add.php" method="POST">

<table class="table table-condensed table-hover table-striped table-bordered">
<tr>
<td width="50" style="text-align:left">Purchase</td>
<td width="200">
<select class="form-control" name="category"  id="select_vendor" required>
<option value="">SELECT ONE</option>
</select>
</td>
</tr>
<tr>
<td width="50" style="text-align:left">Location</td>
<td width="200">
<select class="form-control" name="category"  id="select_vendor" required>
<option value="">SELECT ONE</option>
</select>
</td>
</tr>
<tr>
<td width="50" style="text-align:left">Material/Cat. No</td>
<td width="200">
<select class="form-control" name="category"  id="select_vendor" required>
<option value="">SELECT ONE</option>
</select>
</td>
</tr>
<tr>
<td style="text-align:left">Lot No.</td>
<td><input class="form-control" type="text" maxlength="100" required name="contact" style='text-transform:uppercase' required/></td>
</tr>
<tr>
<td style="text-align:left">Serial No.</td>
<td><input class="form-control" type="text" maxlength="100" required name="address_line_one" style='text-transform:uppercase' /></td>
</tr>
<tr>
<td style="text-align:left">Expire Date:</td>
<td width="200">
<select class="form-control" name="category"  id="select_vendor" required>
<option value="">SELECT ONE</option>
</select>
</td>
</tr>
<tr>
<td style="text-align:left">Quantity</td>
<td>
<input class="form-control" type="text" maxlength="100" required name="city" style='text-transform:uppercase'/>
<input type="radio" name="measurement_unit" value="ml"/>ML
<input type="radio" name="measurement_unit" value="container">Container
</td>
</tr>
<tr>
<td style="text-align:left">Print Barcode</td>
<td>
<input type="checkbox" name="check_print"/>
<input class="form-control" type="text" maxlength="100" required name="country" style='text-transform:uppercase'/></td>
</tr>
</table>

<p style="text-align:center">
<input  type="submit" value="Receive" name="submit" />
<input  type="submit" value="Close" name="close" />
</p>
</form>
@stop