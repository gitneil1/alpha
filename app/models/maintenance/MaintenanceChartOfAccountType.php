<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;
use App\Models\Maintenance\MaintenanceChartOfAccount;

class MaintenanceChartOfAccountType extends Model
{
    public function account(){
    	return $this->hasMany('App\Models\Maintenance\MaintenanceChartOfAccount', 'account_type');
    }

    //return array of account_type_name
    public static function returnAllTypeNames(){
    	//array that will hold all account_type_names
    	$type_names_arr = array();
    	//return array of MaintenanceChartOfAccountType
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($type_names_arr, $value['account_type_name']);
    	}
    	return $type_names_arr;
    }

    //return array of ids
    public static function returnAllIds(){
    	//array that will hold all id
    	$ids_arr = array();
    	//return array of MaintenanceChartOfAccountType
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($ids_arr, $value['id']);
    	}
    	return $ids_arr;
    }

    //return array of types
    public static function returnAllTypes(){
    	//array that will hold all account_type
    	$types_arr = array();
    	//return array of MaintenanceChartOfAccountType
    	$types = self::all();
    	foreach ($types as $key => $value) {
    		array_push($types_arr, $value['account_type']);
    	}
    	return $types_arr;
    }

    public static function combineTypeAndTypeName(){
    	$types = self::returnAllTypes();
    	$type_names = self::returnAllTypeNames();
    	$combined_string = array();

    	$count = count($types) - 1;
    	for($i = 0; $i <= $count ; $i++){
    		$combined_string[$i] = $types[$i] . ' - ' . $type_names[$i];
    	}
    	return $combined_string;
    }

    //return array of 'id' as key and $combined_string as value
    public static function returnIdsAndValues(){
    	$combined_array = array_combine(self::returnAllIds(), self::combineTypeAndTypeName());
    	print_r($combined_array);
    }
}
