<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestockRequest;
use App\Models\RestockItem;
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
        $restock = RestockRequest::find($id);

        
        if($restock->status != 'Recieved')
        {
            if($this->request->status != 'Recieved') 
            {
                $restock->update([
                    'status' => $this->request->status,
                    'date_approved' => $this->request->status == 'Approved' ? Carbon::now() : null
                ]);
            } 
            else 
            {
                $asset = Asset::find($this->request->asset_item_id);

                $total_asset = $asset->number_of_stocks + $this->request->number_of_stocks;

                $restock->update([
                    'status' => $this->request->status,
                ]);

                $asset->update([
                    'number_of_stocks' => $total_asset,
                ]);
            }
        }
        
        return redirect()->route('page.index', 'restocks');
    }
}
