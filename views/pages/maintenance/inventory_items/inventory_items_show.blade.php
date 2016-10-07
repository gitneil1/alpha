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
                    <a href="/maintenance/maintain_inventory_items/inventory_items/create">Add Inventory Item</a>
                </li>
                <li>
                    <a href="/maintenance/maintain_inventory_items/inventory_items/">View Inventory Items List</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h2>
            <strong>Inventory Item ID:</strong> 
            {{ $inventory_item->inventory_item_id }}
        </h2>
        <h2>
            <strong>Inventory Item Class:</strong>
            {{ $inventory_item->inventory_item_class }}
        </h2>
        
    </div>

</div>
@stop