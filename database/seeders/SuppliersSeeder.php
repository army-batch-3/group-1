<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'name' => 'HHH Supplier',
            'email' => 'hh@sup.com',
            'logo' => '',
            'contact_number' => '09876543212',
            'contact_person' => 'John Doe',
            'address' => 'Taguig City'
        ]);

        Supplier::create([
            'name' => 'RRR Supplier',
            'email' => 'rr@sup.com',
            'logo' => '',
            'contact_number' => '09812735619',
            'contact_person' => 'Jane Smith',
            'address' => 'Makati City'
        ]);

        Supplier::create([
            'name' => 'ZYX Supplier',
            'email' => 'zyx@sup.com',
            'logo' => '',
            'contact_number' => '097865467241',
            'contact_person' => 'James Dow',
            'address' => 'Manila City'
        ]);
    }
}
