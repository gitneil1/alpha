<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MaintenanceController extends Controller
{
    public function list_coa_actions(){
    	return view('pages.maintenance.maintain_coa');
    }

    public function list_vendor_actions(){
    	return view('pages.maintenance.maintain_vendors');
    }

    public function list_inventory_item_actions(){
    	return view('pages.maintenance.maintain_inventory_items');
    }

    public function list_customer_actions(){
    	return view('pages.maintenance.maintain_customers');
    }

    public function list_cost_center_actions(){
    	return view('pages.maintenance.maintain_cost_center');
    }
}
