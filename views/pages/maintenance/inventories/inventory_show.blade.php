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
                    <a href="/maintenance/maintain_inventorys/inventorys/create">Add Inventory Item</a>
                </li>
                <li>
                    <a href="/maintenance/maintain_inventorys/inventorys/">View Inventory Items List</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center">

        <table class="table table-striped table-bordered">
            <tr>
                <td>Inventory ID</td>
                <td>Inventory Description</td>
                <td>Inventory Item Id</td>
                <td>gl_sales_account</td>
                <td>gl_inventory_account</td>
                <td>gl_cost_of_sales_account</td>
            </tr>
            
            <tr>
                <td>{{ $inventory->inventory_id }}</td>
                <td>{{ $inventory->inventory_description }}</td>
                <td>{{ $inventory->inventory_item_id . ' - ' . $inventory_items[] }} </td>
            </tr>
            
        </table>
        
    </div>

</div>
@stop