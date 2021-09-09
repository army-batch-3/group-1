<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
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
        Employee::create([
            'first_name' => $this->request->first_name,
            'last_name' =>  $this->request->last_name,
            'middle_name' =>  $this->request->middle_name,
            'photo' => $this->request->photo,
            'employee_type' =>  $this->request->employee_type,
        ]);
        return redirect()->route('page.index', 'employees');
    }

    public function update($id)
    {
        Employee::find($id)->update([
            'first_name' => $this->request->first_name,
            'last_name' =>  $this->request->last_name,
            'middle_name' =>  $this->request->middle_name,
            'photo' => $this->request->photo,
            'employee_type' =>  $this->request->employee_type,
        ]);
        return redirect()->route('page.index', 'employees');
    }

    public function delete($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('page.index', 'employees');

    }
}
