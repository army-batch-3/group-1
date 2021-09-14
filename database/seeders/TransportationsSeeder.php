<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transportation;

class TransportationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transportation::create([
            'type' => 'Delivery',
            'vehicle_id' => 1,
            'plate_number' => 'ABC 123',
            'status' => 'Available'
        ]);

        Transportation::create([
            'type' => 'Delivery',
            'vehicle_id' => 1,
            'plate_number' => 'EFG 456',
            'status' => 'Available'
        ]);

        Transportation::create([
            'type' => 'Delivery',
            'vehicle_id' => 2,
            'plate_number' => 'XYZ 090',
            'status' => 'Available'
        ]);

        Transportation::create([
            'type' => 'Delivery',
            'vehicle_id' => 2,
            'plate_number' => 'YTY 899',
            'status' => 'Available'
        ]);

        Transportation::create([
            'type' => 'Delivery',
            'vehicle_id' => 3,
            'plate_number' => 'YHW 316',
            'status' => 'Available'
        ]);
    }
}
