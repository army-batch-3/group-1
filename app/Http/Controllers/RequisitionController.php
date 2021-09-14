<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequisitionRequest;
use App\Models\RequisitionItem;

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
            'requestor_id' => $user_id,
            'status' => 'Pending',
        ]);

        RequisitionItem::create([
            'requisition_id' => $data->id,
            'asset_id' => $this->request->asset_id,
            'quantity' => $this->request->quantity
        ]);
        
        return redirect()->route('page.index', 'requisitions');
    }
}
