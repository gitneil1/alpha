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

<div class="purchase_order_form">
<h1>Purchase Order</h1>
<form action="" method="POST">

<table class="table table-condensed table-hover table-striped table-bordered">
<tr >
<td style="text-align:left">Company Name</td>
<td>
	<input class="form-control" type="text" maxlength="100" required name="contact" style='text-transform:uppercase' required/>
</td>
</tr>
<tr>
<td style="text-align:left">Address</td>
<td><input class="form-control" type="text" maxlength="100" required name="contact" style='text-transform:uppercase' required/></td>
</tr>
<tr>
<td style="text-align:left">City</td>
<td><input class="form-control" type="text" maxlength="100" required name="address_line_one" style='text-transform:uppercase' /></td>
</tr>
<tr>
<td style="text-align:left">Status/Province</td>
<td><input class="form-control" type="text" maxlength="100" required name="address_line_two" style='text-transform:uppercase'/></td>
</tr>
<tr>
<td style="text-align:left">Zip/Postal Code</td>
<td><input class="form-control" type="text" maxlength="100" required name="city" style='text-transform:uppercase'/></td>
</tr>
<tr>
<td style="text-align:left">Country</td>
<td><input class="form-control" type="text" maxlength="100" required name="country" style='text-transform:uppercase'/></td>
</tr>
<tr>
<td style="text-align:left">Phone</td>
<td><input class="form-control" type="text" maxlength="100" required name="tax_id_num"/></td>
</tr>
<tr>
<td style="text-align:left">Fax</td>
<td><input class="form-control" type="text" maxlength="100" required name="vendor_email"/></td>
</tr>
<tr>
<td style="text-align:left">Email</td>
<td><input class="form-control" type="text" maxlength="100" required name="tel_num"/></td>
</tr>

<tr>
<td colspan="2"></td>
</tr>
</table>

<p style="text-align:center"><input  type="submit" value="Save" name="submit" /></p>
</form>

	<!--form class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Email</label>
            <div class="col-xs-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-2">Password</label>
            <div class="col-xs-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form-->


</div>
@stop