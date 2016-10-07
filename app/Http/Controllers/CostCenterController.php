<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceCostCenter;

class CostCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cost_centers = MaintenanceCostCenter::all();
        return view('pages.maintenance.cost_centers.cost_center_index')
            ->with('cost_centers', $cost_centers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.maintenance.cost_centers.cost_center_create');
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
            'cost_center_id' => 'required',
            'cost_center_name' => 'required',
            'status' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('/maintenance/maintain_cost_center/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $cost_center = new MaintenanceCostCenter;
            $cost_center->cost_center_name = \Input::get('cost_center_name');
            $cost_center->cost_center_id = \Input::get('cost_center_id');
            $cost_center->status = \Input::get('status');
            $cost_center->save();
            //redirect
            \Session::flash('message', 'Successfully added Cost Center.');
            return \Redirect::to('/maintenance/maintain_cost_center');
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
        $cost_center = MaintenanceCostCenter::find($id);
        //show the view and pass the customer type
        return view('pages.maintenance.cost_centers.cost_center_show')
            ->with('cost_center', $cost_center);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cost_center = MaintenanceCostCenter::find($id);
        return view('pages.maintenance.cost_centers.cost_center_edit')
            ->with('cost_center', $cost_center);
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
            'cost_center_id' => 'required',
            'cost_center_name' => 'required',
            'status' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the update
        if($validator->fails()){
            return \Redirect::to('maintenance/maintain_cost_centers/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //save the update
            $cost_center = MaintenanceCostCenter::find($id);
            $cost_center->cost_center_id = \Input::get('cost_center_id');
            $cost_center->cost_center_name = \Input::get('cost_center_name');
            $cost_center->status = \Input::get('status');
            //save changes to the database
            $cost_center->save();
            //redirect
            \Session::flash('message', 'Successfully updated cost center');
            return \Redirect::to('maintenance/maintain_cost_center');
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
        $cost_center = MaintenanceCostCenter::find($id);
        $cost_center->delete();
        \Session::flash('message', 'Successfully deleted record');
        return \Redirect::to('maintenance/maintain_cost_center');
    }
}
