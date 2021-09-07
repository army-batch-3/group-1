<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation;

class TranportationController extends Controller
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

    public function test()
    {
        // add to db 
        
        Transportation::create([
            'type' => $this->request->type,
            'vehicle_id' => 1,
            'plate_number' =>  $this->request->plate_number
        ]);
        return redirect()->route('page.index', 'transportations');
    }
}
