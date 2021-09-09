<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;


class AssetController extends Controller
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
        Asset::create([
            'name' => $this->request->name,
            // 'photo' => $this->request->photo,
            'number_of_stocks' =>  $this->request->number_of_stocks,
            'type' =>  $this->request->type,
            'supplier_id' =>  $this->request->supplier_id,
            'warehouse_id' =>  $this->request->warehouse_id,
            'price' =>  $this->request->price
        ]);
        return redirect()->route('page.index', 'assets');
    }

    public function update($id)
    {
        Asset::find($id)->update([
            'name' => $this->request->name,
            // 'photo' => $this->request->photo,
            'number_of_stocks' =>  $this->request->number_of_stocks,
            'type' =>  $this->request->type,
            'supplier_id' =>  $this->request->supplier_id,
            'warehouse_id' =>  $this->request->warehouse_id,
            'price' =>  $this->request->price
        ]);
        return redirect()->route('page.index', 'assets');
    }

    public function delete($id)
    {
        Asset::find($id)->delete();
        return redirect()->route('page.index', 'assets');

    }
}
