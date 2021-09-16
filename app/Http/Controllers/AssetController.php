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
        // saveImage($path) is called from extended Controller class
        
        Asset::create([
            'name' => $this->request->name,
            'photo' => $this->request->photo != null ? $this->saveImage('asset', $this->request->photo) : '',
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
        $asset = Asset::find($id);
        
        // saveImage($path) is called from extended Controller clas
        
        $asset->update([
            'name' => $this->request->name,
            'photo' => $this->request->photo != null ? $this->saveImage('asset', $this->request->photo) : $asset->photo,
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
