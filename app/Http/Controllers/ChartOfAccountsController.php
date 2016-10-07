<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceChartOfAccount;
use App\Models\Maintenance\MaintenanceChartOfAccountType;

class ChartOfAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieve all records
        $chart_of_accounts = MaintenanceChartOfAccount::all();

        $chart_of_accounts_types0 = MaintenanceChartOfAccountType::all();
        //get an array of account_type ('cash, check' etc)
        $chart_of_account_types = self::getCombinedArrayOfKeysAndValues($chart_of_accounts_types0);

        //load the view with the array of data
        return view('pages.maintenance.chart_of_accounts.index')
            ->with('chart_of_accounts', $chart_of_accounts)
            ->with('chart_of_account_types', $chart_of_account_types);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get all account type records from DB. The retrieved data will populate the 
        //Account Type option
        $chart_of_account_types_arr = MaintenanceChartOfAccountType::all();
        $chart_of_account_types_keys = array();
        $chart_of_account_types_values = array();

        //{"id":1,"account_type":"1","account_type_name":"Cash","created_at":"2016-09-30 06:51:21","updated_at":"2016-09-30 06:51:21"}
        //get all unique id from MaintenanceChartOfAccountType. this id will be used as key
        $chart_of_account_type_ids = self::getAllIdsFromMaintenanceChartOfAccountType($chart_of_account_types_arr);

        //store account_type in an array that will be combined with keys
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //get the id
            $chart_of_account_types_keys[$i] = str_replace('"', '',substr($types_arr[1], 16));
        }
        
        //store value in an array.
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //add the account_id to the value of account type string
            $chart_of_account_types_values[$i] =  $chart_of_account_types_keys[$i] . ' - ';

            $chart_of_account_types_values[$i] .= str_replace('"', '', (substr($types_arr[2], 21)));
        }
        echo "<br/>";
        
        //combine array of keys and values
        $chart_of_account_types0 = array_combine($chart_of_account_types_keys, $chart_of_account_types_values);

        //combine array of ids with array of keys and values
        $chart_of_account_types = array_combine($chart_of_account_type_ids, $chart_of_account_types0);

        return view('pages.maintenance.chart_of_accounts.create_coa')
            ->with('chart_of_account_types', $chart_of_account_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'account_id' => 'required',
            'account_description' => 'required',
            'account_type' => 'required',
            'status' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('chart_of_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $chart_of_account = new MaintenanceChartOfAccount;
            $chart_of_account->account_id = \Input::get('account_id');
            $chart_of_account->account_description = \Input::get('account_description');
            $chart_of_account->account_type = \Input::get('account_type');
            $chart_of_account->status = \Input::get('status');

            //get the correct account_type and account_type_name using the key which is the unique id
            //$correct_account_type = MaintenanceChartOfAccountType::find(\Input::get('account_type'));
            
            //$account_type_id = $correct_account_type['id'];
            //$account_type = $correct_account_type['account_type'];
            //$account_type_name = $correct_account_type['account_type_name'];

            //$chart_of_account->account_type_id = $account_type_id;
            //$chart_of_account->account_type = $account_type;
            //$chart_of_account->account_type_name = $account_type_name;

            $chart_of_account->save();
            //redirect
            \Session::flash('message', 'Successfully added chart of accounts.');
            return \Redirect::to('/chart_of_accounts');
        }
        /*
        $rules = array(
            'account_id' => 'required',
            'account_description' => 'required',
            'account_type' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('chart_of_accounts/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $chart_of_account = new MaintenanceChartOfAccount;
            $chart_of_account->account_id = \Input::get('account_id');
            $chart_of_account->account_description = \Input::get('account_description');

            //get the correct account_type and account_type_name using the key which is the unique id
            $correct_account_type = MaintenanceChartOfAccountType::find(\Input::get('account_type'));
            
            $account_type_id = $correct_account_type['id'];
            $account_type = $correct_account_type['account_type'];
            $account_type_name = $correct_account_type['account_type_name'];

            $chart_of_account->account_type_id = $account_type_id;
            $chart_of_account->account_type = $account_type;
            $chart_of_account->account_type_name = $account_type_name;

            $chart_of_account->save();
            //redirect
            \Session::flash('message', 'Successfully added chart of accounts.');
            return \Redirect::to('/chart_of_accounts');
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chart_of_account = MaintenanceChartOfAccount::find($id);
        //show the view and pass the account
        return view('pages.maintenance.chart_of_accounts.show_coa')
            ->with('chart_of_account', $chart_of_account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get all account type records from DB. The retrieved data will populate the 
        //Account Type option
        $chart_of_account_types_arr = MaintenanceChartOfAccountType::all();
        $chart_of_account_types_keys = array();
        $chart_of_account_types_values = array();

        //{"id":1,"account_type":"1","account_type_name":"Cash","created_at":"2016-09-30 06:51:21","updated_at":"2016-09-30 06:51:21"}

        //store account_type in an array that will be combined with keys
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //get the id
            $chart_of_account_types_keys[$i] = str_replace('"', '',substr($types_arr[1], 16));
        }
        
        //store value in an array.
        for($i = 0; $i < count($chart_of_account_types_arr); $i++){
            $types_arr = explode(',', $chart_of_account_types_arr[$i]);
            //add the account_id to the value of account type string
            $chart_of_account_types_values[$i] =  $chart_of_account_types_keys[$i] . ' - ';

            $chart_of_account_types_values[$i] .= str_replace('"', '', (substr($types_arr[2], 21)));
        }
        //combine array of keys and values
        $chart_of_account_types = array_combine($chart_of_account_types_keys, $chart_of_account_types_values);

        $chart_of_account = MaintenanceChartOfAccount::find($id);
        return view('pages.maintenance.chart_of_accounts.edit_coa')
            ->with('chart_of_account', $chart_of_account)
            ->with('chart_of_account_types', $chart_of_account_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'account_id' => 'required',
            'account_description' => 'required',
            'account_type' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the update
        if($validator->fails()){
            return \Redirect::to('chart_of_accounts/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //save the update
            $chart_of_account = MaintenanceChartOfAccount::find($id);
            $chart_of_account->account_id = \Input::get('account_id');
            $chart_of_account->account_description = \Input::get('account_description');
            $chart_of_account->account_type = \Input::get('account_type');
            $chart_of_account->save();
            //redirect
            \Session::flash('message', 'Successfully updated');
            return \Redirect::to('chart_of_accounts');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete record
        $chart_of_account = MaintenanceChartOfAccount::find($id);
        $chart_of_account->delete();
        \Session::flash('message', 'Successfully deleted record');
        return \Redirect::to('chart_of_accounts');
    }

    public function getAllIdsFromMaintenanceChartOfAccountType($customer_types_arr){
        $idsArray = array();
        foreach ($customer_types_arr as $key => $value) {
            $idsArray[$key] = $value['id'];//error here- key > array_count
        }
        return $idsArray;
    }

    public function getAllTypesFromMaintenanceChartOfAccountType($customer_types_arr){
        $keysArray = array();
        foreach ($customer_types_arr as $key => $value) {
            $keysArray[$key] = $value['account_type_name'];
        }
        return $keysArray;
    }

    public function getCombinedArrayOfKeysAndValues($customer_types_arr){
        //return an array of all unique ids from MaintenancecustomerType. this id will be used as key
        $customer_type_ids = self::getAllIdsFromMaintenanceChartOfAccountType($customer_types_arr);
        //store account_type in an array that will be combined with keys
        $customer_types_codes = self::getAllTypesFromMaintenanceChartOfAccountType($customer_types_arr);
        //combine array of ids with array of keys and values
        return array_combine($customer_type_ids, $customer_types_codes);
    }
}
