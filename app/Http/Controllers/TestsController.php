<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Phone;
use App\Models\Maintenance\MaintenanceChartOfAccountType;
use App\Models\Maintenance\MaintenanceChartOfAccount;
use App\Models\Maintenance\MaintenanceInventoryItem;
use App\Models\Maintenance\MaintenanceInventory;
use App\Models\Maintenance\MaintenanceVendor;


class TestsController extends Controller
{
    public function relationships(){
    	//phone of User id:1
    	$phone = User::find(1)->phone;
    	//user of Phone id:2
    	$user = Phone::find(2)->user;
    	//test MaintenanceChartOfAccount
    	//$chart = MaintenanceChartOfAccount::find(4);
    	$chart_of_account_ids = array();
    	$chart = MaintenanceChartOfAccount::all();
    	//echo $chart;
    	foreach ($chart as $key => $value) {
    		array_push($chart_of_account_ids, $value->id);
    	}
    	 //$chart_of_account_ids;

    	//$chart_of_account_type = $chart->type;

    	//test MaintenanceChartOfAccountType
    	//MaintenanceChartOfAccountType::returnIdsAndValues();
    	//print_r(MaintenanceChartOfAccount::returnIdsAndValues());
    	//print_r(MaintenanceInventoryItem::returnIdsAndValues());

        //$inventory = MaintenanceInventory::find(1)->inventory;
        //print_r($inventory);

        $t = MaintenanceChartOfAccount::find(3)->type;
        echo $t->account_type_name;//working

        $c = MaintenanceChartOfAccountType::find(1)->account;
        //echo $c;//working-- returns array of objects
        foreach ($c as $key => $value) {
            echo $value->account_description;
        }

        //vendor test
        //$vendor_ids = MaintenanceVendor::returnLogsAndValues();//working
        //print_r($vendor_ids);
        //end vendor test
        //inventory test
        $inventory_ids = MaintenanceInventory::returnLogsAndValues();//working
        print_r($inventory_ids);
        //end inventory test
        //$c = MaintenanceChartOfAccount::find(1);
        //print_r($c->inventory);
    	/*
    	return view('pages.tests.relationships')
    		->with('phone', $phone)
    		->with('user', $user)
    		->with('chart', $chart)
    		->with('chart_of_account_type', $chart_of_account_type);
    	*/	
    }
}
