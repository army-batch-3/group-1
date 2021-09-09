<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
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
        Supplier::create([
            'name' => $this->request->name,
            // 'logo' => $this->request->logo,
            'email' => $this->request->email,
            'contact_number' =>  $this->request->contact_number,
            'contact_person' =>  $this->request->contact_person,
            'address' =>  $this->request->address
        ]);
        return redirect()->route('page.index', 'suppliers');
    }

    public function update($id)
    {
        Supplier::find($id)->update([
            'name' => $this->request->name,
            // 'logo' => $this->request->logo,
            'email' => $this->request->email,
            'contact_number' =>  $this->request->contact_number,
            'contact_person' =>  $this->request->contact_person,
            'address' =>  $this->request->address
        ]);
        return redirect()->route('page.index', 'suppliers');
    }

    public function delete($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('page.index', 'suppliers');

    }
}
