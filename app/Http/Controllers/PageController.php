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
                ->select('t.type', 't.plate_number', 'v.brand as vehicle', 't.status', 't.id', 'v.id as vehicle_id', )
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
        else if($page == 'restocks') {
            $data = $this->getRestockData();
        }
        else if($page == 'requisitions') {
            $employee = Employee::all();
            $transportations = $this->getTrasnportations();

            $assets = DB::table('rf_assets as a')
                ->join('rf_suppliers as s', 's.id', '=', 'a.supplier_id')
                ->join('rf_warehouses as w', 'w.id', '=', 'a.warehouse_id')
                ->select('a.id', 'a.name', 'a.photo', 'a.number_of_stocks', 'a.type', 'a.price', 's.name as supplier', 'w.name as warehouse', 's.id as supplier_id', 'w.id as warehouse_id')
                ->get();

            $requisition = DB::table('tr_requisition_items as i')
                ->join('tr_requisition_requests as q', 'q.id', '=', 'i.requisition_id')
                ->join('rf_assets as a', 'a.id', '=', 'i.asset_id')
                ->join('rf_transportations as t', 't.id', '=', 'q.transportation_id')
                ->select('i.id as requisition_id', 'q.id as requisition_request_id', 'i.asset_id as asset_item_id', 'a.name as asset', 'a.photo as asset_photo', 
                    'i.quantity', 'q.status',  'q.date_approved', 't.plate_number as transportation')
                
                ->get();

            $data = (object) [
                    "assets" => $assets,
                    "requisition" => $requisition,
                    "transportations" => $transportations,
                    "employee" => $employee
                ];
        }

        return $data;
    }

    private function getTrasnportations() 
    {
        return DB::table('rf_transportations as t')
            ->join('rf_vehicles as v', 'v.id', '=', 't.vehicle_id')
            ->select('t.type', 't.plate_number', 'v.brand as vehicle', 't.status',  't.id', 'v.id as vehicle_id')
            ->get();
    }

    private function getAssets() 
    {
        return DB::table('rf_assets as a')
            ->join('rf_suppliers as s', 's.id', '=', 'a.supplier_id')
            ->join('rf_warehouses as w', 'w.id', '=', 'a.warehouse_id')
            ->select('a.id', 'a.name', 'a.photo', 'a.number_of_stocks', 'a.type', 'a.price', 's.name as supplier', 'w.name as warehouse', 's.id as supplier_id', 'w.id as warehouse_id')
            ->get();
    }

    private function getRestockData()
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();

        $assets = $this->getAssets();

        $transportations = $this->getTrasnportations();

        $restock = DB::table('tr_restock_items as i')
            ->join('tr_restock_requests as q', 'q.id', '=', 'i.restock_id')
            ->join('rf_assets as a', 'a.id', '=', 'i.asset_id')
            ->join('rf_suppliers as s', 's.id', '=', 'q.supplier_id')
            ->join('rf_warehouses as w', 'w.id', '=', 'q.warehouse_id')
            ->join('rf_transportations as t', 't.id', '=', 'q.transportation_id')
            ->select('i.id as restock_id', 'q.id as restock_request_id', 'i.asset_id as asset_item_id','a.name as asset', 'a.photo as asset_photo', 's.name as supplier', 's.logo as supplier_logo',
                'w.name as warehouse', 't.plate_number as transportation', 'i.quantity', 'q.status', 'q.date_approved')
            ->get();
        
        $data = (object) [
            "suppliers" => $suppliers,
            "warehouses" => $warehouses,
            "assets" => $assets,
            "transportations" => $transportations,
            "restock" => $restock
        ];

        return $data;
    }
    
    public function test(Request $request)
    {
        // add to db 
        return redirect()->route('page.index', 'users');
    }


}
