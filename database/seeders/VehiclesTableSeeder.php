<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'brand' => "Honda"
        ]);

        Vehicle::create([
            'brand' => "Mitsubishi"
        ]);

        Vehicle::create([
            'brand' => "Toyota"
        ]);
    }
}
