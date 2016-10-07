<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceChartOfAccountType;
use App\Models\Maintenance\MaintenanceChartOfAccount;

class ChartOfAccountTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart_of_account_types = MaintenanceChartOfAccountType::all();
        return view('pages.maintenance.chart_of_account_types.index')
            ->with('chart_of_account_types', $chart_of_account_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.maintenance.chart_of_account_types.create');
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
            'account_type' => 'required',
            'account_type_name' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('chart_of_account_types/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $chart_of_account_type = new MaintenanceChartOfAccountType;
            $chart_of_account_type->account_type = \Input::get('account_type');
            $chart_of_account_type->account_type_name = \Input::get('account_type_name');
            $chart_of_account_type->save();
            //redirect
            \Session::flash('message', 'Successfully added chart of account type.');
            return \Redirect::to('/chart_of_account_types');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chart_of_account_type = MaintenanceChartOfAccountType::find($id);
        //show the view and pass the account
        return view('pages.maintenance.chart_of_account_types.show_coa_type')
            ->with('chart_of_account_type', $chart_of_account_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chart_of_account_type = MaintenanceChartOfAccountType::find($id);
        return view('pages.maintenance.chart_of_account_types.edit_coa_type')
            ->with('chart_of_account_type', $chart_of_account_type);
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
            'account_type' => 'required',
            'account_type_name' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the update
        if($validator->fails()){
            return \Redirect::to('chart_of_account_types/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //save the update
            $chart_of_account_type = MaintenanceChartOfAccountType::find($id);
            $chart_of_account_type->account_type = \Input::get('account_type');
            $chart_of_account_type->account_type_name = \Input::get('account_type_name');
            //save changes to the database
            $chart_of_account_type->save();
            //get all account types with this id then update 
            MaintenanceChartOfAccount::where('account_type_id', '=', $id)
                ->update([
                    'account_type' => \Input::get('account_type'),
                    'account_type_name' => \Input::get('account_type_name')
                ]);

            //redirect
            \Session::flash('message', 'Successfully updated type');
            return \Redirect::to('chart_of_account_types');
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
        $chart_of_account_type = MaintenanceChartOfAccountType::find($id);
        $chart_of_account_type->delete();
        \Session::flash('message', 'Successfully deleted record');
        return \Redirect::to('chart_of_account_types');
    }
}
