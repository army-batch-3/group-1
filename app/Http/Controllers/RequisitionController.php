<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequisitionRequest;
use App\Models\RequisitionItem;
use App\Models\Transportation;
use App\Models\Asset;
use \Carbon\Carbon;

class RequisitionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }

    public function create()
    {
        $user_id = \Auth::id();

        $data = RequisitionRequest::create([
            'transportation_id' => $this->request->transportation_id,
            'requestor_id' => $user_id,
            'status' => 'Pending'
        ]);

        RequisitionItem::create([
            'requisition_id' => $data->id,
            'asset_id' => $this->request->asset_id,
            'quantity' => $this->request->quantity,
            
        ]);
        
        return redirect()->route('page.index', 'requisitions');
    }


    public function update($id)
    {
        $requisition_item = RequisitionItem::find($id);

        $requisition = RequisitionRequest::find($requisition_item->requisition_id);
        $transportation = Transportation::find($requisition->transportation_id);

        if($this->request->status != 'Recieved') 
        {
            $requisition->update([
                'status' => $this->request->status,
                'date_approved' => $this->request->status == 'Approved' ? Carbon::now() : $requisition->date_approved
            ]);

            if($this->request->status == 'Shipped') {
                $transportation->update([
                    'status' => 'Delivery'
                ]);
            }
                
            if($this->request->status == 'Dropped Off') {
                $transportation->update([
                    'status' => 'Available'
                ]);
            }
        }
        else 
        {
            $asset = Asset::find($this->request->asset_item_id);

            $total_asset = $asset->number_of_stocks - $this->request->number_of_stocks;

            $requisition->update([
                'status' => $this->request->status,
            ]);

            $requisition_item->update([
                'quantity' => '0'
            ]);

            $asset->update([
                'number_of_stocks' => $total_asset,
            ]);
        }

        return redirect()->route('page.index', 'requisitions');
    }
}
