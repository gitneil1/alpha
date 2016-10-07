<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceInventory;
use App\Models\Maintenance\MaintenanceChartOfAccount;
use App\Models\Maintenance\MaintenanceInventoryItem;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory = MaintenanceInventory::all();
        return view('pages.maintenance.inventories.inventory_index')
            ->with('inventory', $inventory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get chart of accounts
        $chart_of_accounts = MaintenanceChartOfAccount::returnIdsAndValues();
        
        //get inventory items
        $inventory_items = MaintenanceInventoryItem::returnIdsAndValues();

        return view('pages.maintenance.inventories.inventory_create')
            ->with('chart_of_accounts', $chart_of_accounts)
            ->with('inventory_items', $inventory_items);
            
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
            'inventory_id' => 'required',
            'inventory_description' => 'required',
            'inventory_item_id' => 'required',
            'gl_sales_account' => 'required',
            'gl_inventory_account' => 'required',
            'gl_cost_of_sales_account' => 'required',
            'status' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('/maintenance/maintain_inventory/inventory/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $inventory = new MaintenanceInventory;
            $inventory->inventory_id = \Input::get('inventory_id');
            $inventory->inventory_description = \Input::get('inventory_description');
            $inventory->inventory_item_id = \Input::get('inventory_item_id');
            $inventory->gl_sales_account = \Input::get('gl_sales_account');
            $inventory->gl_inventory_account = \Input::get('gl_inventory_account');
            $inventory->gl_cost_of_sales_account = \Input::get('gl_cost_of_sales_account');
            $inventory->status = \Input::get('status');
            $inventory->save();
            //redirect
            \Session::flash('message', 'Successfully added inventory.');
            return \Redirect::to('maintenance/maintain_inventory_items/inventory');
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
        $inventory = MaintenanceInventory::find($id);
        //echo $inventory->chart_of_account->account_description;

        $chart_of_account = MaintenanceChartOfAccount::find(5);
        echo $chart_of_account->inventory;
        echo '<br/><br/>';
        echo $chart_of_account->sales;


        //get chart of accounts
        //$chart_of_accounts = MaintenanceChartOfAccount::returnIdsAndValues();
        
        //get inventory items
        //$inventory_items = MaintenanceInventoryItem::returnIdsAndValues();

        //return view('pages.maintenance.inventories.inventory_show')
            //->with('inventory', $inventory)
            //->with('chart_of_accounts', $chart_of_accounts)
            //->with('inventory_items', $inventory_items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
