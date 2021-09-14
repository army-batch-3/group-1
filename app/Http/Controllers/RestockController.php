<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestockRequest;
use App\Models\RestockItem;
use App\Models\Transportation;
use App\Models\Asset;
use \Carbon\Carbon;

class RestockController extends Controller
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
        $data = RestockRequest::create([
            'supplier_id' => $this->request->supplier_id,
            'warehouse_id' => $this->request->warehouse_id,
            'transportation_id' => $this->request->transportation_id,
            'status' => 'Pending'
        ]);

        RestockItem::create([
            'restock_id' => $data->id,
            'asset_id' => $this->request->asset_id,
            'quantity' => $this->request->quantity
        ]);
        

        return redirect()->route('page.index', 'restocks');
    }

    public function update($id)
    {
        $restock_item = RestockItem::find($id);

        $restock = RestockRequest::find($restock_item->restock_id);
        $transportation = Transportation::find($restock->transportation_id);

        if($this->request->status != 'Recieved') 
        {
            $restock->update([
                'status' => $this->request->status,
                'date_approved' => $this->request->status == 'Approved' ? Carbon::now() : $restock->date_approved
            ]);

            if($this->request->status == 'Shipped') {
                $transportation->update([
                    'type' => 'Delivery'
                ]);
            }
                
            if($this->request->status == 'Dropped Off') {
                $transportation->update([
                    'type' => 'Available'
                ]);
            }
        }
        else 
        {
            $asset = Asset::find($this->request->asset_item_id);

            $total_asset = $asset->number_of_stocks + $this->request->number_of_stocks;

            $restock->update([
                'status' => $this->request->status,
            ]);

            $restock_item->update([
                'quantity' => '0'
            ]);

            $asset->update([
                'number_of_stocks' => $total_asset,
            ]);
        }
        
        return redirect()->route('page.index', 'restocks');
    }
}
