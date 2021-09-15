<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
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
        Warehouse::create([
            'name' => $this->request->name,
            'floor' => $this->request->floor,
            'bldg' =>  $this->request->bldg,
            'room' =>  $this->request->room,
            'address' =>  $this->request->address,
            'section' =>  $this->request->section,
            'contact_number' =>  $this->request->contact_number
        ]);
        return redirect()->route('page.index', 'warehouse');
    }

    public function update($id)
    {
        Warehouse::find($id)->update([
            'name' => $this->request->name,
            'floor' => $this->request->floor,
            'bldg' =>  $this->request->bldg,
            'room' =>  $this->request->room,
            'address' =>  $this->request->address,
            'section' =>  $this->request->section,
            'contact_number' =>  $this->request->contact_number
        ]);
        return redirect()->route('page.index', 'warehouse');
    }

    public function delete($id)
    {
        Warehouse::find($id)->delete();
        return redirect()->route('page.index', 'warehouse');

    }
}
