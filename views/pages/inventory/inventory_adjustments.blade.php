@extends('layouts.default')

@section('sidebar')
@include('includes.inventory_module_links')
@stop

@section('content')
Inventory Adjustments Page
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<form action="accounting_maintenance_vendors_add.php" method="POST">

<table class="table table-condensed table-hover table-striped table-bordered">
<tr>
<td width="50" style="text-align:left">Adjustment Type</td>
<td width="200">
<select class="form-control" name="category"  id="select_vendor" required>
<option value="">SELECT ONE</option>
</select>
</td>
</tr>
<tr>
<td width="50" style="text-align:left">Adjustment Date</td>
<td width="200">
<select class="form-control" name="category"  id="select_vendor" required>
<option value="">SELECT ONE</option>
</select>
</td>
</tr>
<tr>
<td width="50" style="text-align:left">Adjustment Account</td>
<td width="200">
<select class="form-control" name="category"  id="select_vendor" required>
<option value="">SELECT ONE</option>
</select>
</td>
</tr>
<tr>
<td width="50" style="text-align:left">Inventory Site</td>
<td width="200">
<select class="form-control" name="category"  id="select_vendor" required>
<option value="">SELECT ONE</option>
</select>
</td>
</tr>
</table>

<p style="text-align:center">
<input  type="submit" value="Find and Select items" name="submit" />
</p>
</form>
@stop