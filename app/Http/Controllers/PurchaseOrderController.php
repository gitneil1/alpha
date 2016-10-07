<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Maintenance\MaintenanceVendor;
use App\Models\Maintenance\MaintenanceInventory;
use App\Models\Maintenance\MaintenanceCostCenter;
use App\Models\Inventory\InventoryPO;
use App\Models\Inventory\InventoryPoItem;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $po_list = InventoryPO::all();

        return view('pages.inventory.po.po_index')
            ->with('po_list', $po_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor_id = MaintenanceVendor::returnLogsAndValues();
        $inventory_id = MaintenanceInventory::returnLogsAndValues();
        $cost_center_id = MaintenanceCostCenter::returnLogsAndValues();

        return view('pages.inventory.po.po_create')
            ->with('vendor_id', $vendor_id)
            ->with('inventory_id', $inventory_id)
            ->with('cost_center_id', $cost_center_id);
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
            'po_num' => 'required',
            'vendor_id' => 'required',
            'po_date' => 'required',
            'po_till_date' => 'required',
            'terms' => 'required',
            'status' => 'required',
            'qty' => 'required',
            'inventory_id' => 'required',
            'unit_price' => 'required',
            'vat' => 'required',
            'cost_center_id' => 'required'
        );

        $validator = \Validator::make(\Input::all(), $rules);
        //process the input
        if($validator->fails()){
            return \Redirect::to('/inventory/purchase_order/create')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }else{
            //store the record
            $po = new InventoryPO;
            $po->po_num = \Input::get('po_num');
            $po->vendor_id = \Input::get('vendor_id');
            $po->po_date = \Input::get('po_date');
            $po->till_date = \Input::get('po_till_date');
            $po->terms = \Input::get('terms');
            $po->status = \Input::get('status');

            $po->save();

            $data = $request->all();
            for($i = 0; $i < count($data['cost_center_id']); $i++){
                //po_items
                $po_items = new InventoryPoItem;
                $po_items->po_num = $data['po_num'];
                $po_items->qty = $data['qty'][$i];
                $po_items->inventory_id = $data['inventory_id'][$i];
                $po_items->unit_price = $data['unit_price'][$i];
                $po_items->vat = $data['vat'][$i];
                $po_items->cost_center_id = $data['cost_center_id'][$i];
                $po_items->save();
            /*
            $po_items = new InventoryPoItem;
            $po_items->po_num = \Input::get('po_num');
            $po_items->qty = \Input::get('qty');
            $po_items->inventory_id = \Input::get('inventory_id');
            $po_items->unit_price = \Input::get('unit_price');
            $po_items->vat = \Input::get('vat');
            $po_items->cost_center_id = \Input::get('cost_center_id');
            $po_items->save();
            */
            }
            
            //redirect
            \Session::flash('message', 'Successfully added PO.');
            return \Redirect::to('/inventory/purchase_order');
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
        //
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
