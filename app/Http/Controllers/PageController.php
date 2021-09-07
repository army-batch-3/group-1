<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Employee;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            $data = $this->getDataPerPage($page);

            return view("pages.{$page}")->with('data', $data);
        }

        return abort(404);
    }

    private function getDataPerPage($page)
    {
        $data = null;
            
        if($page == 'users') {
            $data = User::all();
        }
        else if($page == 'transportations') {
            $vehicles = Vehicle::all();
            $transportations = DB::table('rf_transportations as t')
                ->join('rf_vehicles as v', 'v.id', '=', 't.vehicle_id')
                ->select('t.type', 't.plate_number', 'v.brand as vehicle', 't.id', 'v.id as vehicle_id')
                ->get();

            $data = (object) [
                "transportations" => $transportations,
                "vehicles" => $vehicles
            ];
        }
        else if($page == 'suppliers') {
            $data = Supplier::all();
        }
        else if($page == 'warehouse') {
            $data = Warehouse::all();
        }
        else if($page == 'assets') {
            $suppliers = Supplier::all();
            $warehouses = Warehouse::all();

            $assets = DB::table('rf_assets as a')
                ->join('rf_suppliers as s', 's.id', '=', 'a.supplier_id')
                ->join('rf_warehouses as w', 'w.id', '=', 'a.warehouse_id')
                ->select('a.id', 'a.name', 'a.photo', 'a.number_of_stocks', 'a.type', 'a.price', 's.name as supplier', 'w.name as warehouse', 's.id as supplier_id', 'w.id as warehouse_id')
                ->get();
            
            $data = (object) [
                "suppliers" => $suppliers,
                "warehouses" => $warehouses,
                "assets" => $assets
            ];
        }
        else if($page == 'employees') {
            $data = Employee::all();
        }

        return $data;
    }
    
    public function test(Request $request)
    {
        // add to db 
        return redirect()->route('page.index', 'users');
    }


}
