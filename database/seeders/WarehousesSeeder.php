<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::create([
            'name' => 'ABC Warehouse',
            'floor' => '23',
            'bldg' => 'AAA Bldg',
            'room' => '23',
            'address' => 'Taguig City',
            'section' => '3',
            'contact_number' => '09876543212'
        ]);

        Warehouse::create([
            'name' => 'ZYX Warehouse',
            'floor' => '21',
            'bldg' => 'JJJ Bldg',
            'room' => '33',
            'address' => 'Makati City',
            'section' => '31',
            'contact_number' => '09876543999'
        ]);
    }
}
