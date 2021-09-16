<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'first_name' => 'Steve',
            'last_name' => 'Rogers',
            'middle_name' => 'Grant',
            'photo' => '',
            'employee_type' => 'Type',
        ]);

        Employee::create([
            'first_name' => 'Tony',
            'last_name' => 'Stark',
            'middle_name' => 'Edward',
            'photo' => '',
            'employee_type' => 'Type',
        ]);
    }
}
