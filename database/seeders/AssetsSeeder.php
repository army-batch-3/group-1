<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asset::create([
            'name' => 'Asset 1',
            'photo' => '',
            'number_of_stocks' => '0',
            'type' => 'Item',
            'supplier_id' => '1',
            'warehouse_id' => '1',
            'price' => '1000'
        ]);

        Asset::create([
            'name' => 'Asset 2',
            'photo' => '',
            'number_of_stocks' => '0',
            'type' => 'Item',
            'supplier_id' => '2',
            'warehouse_id' => '2',
            'price' => '1200'
        ]);

        Asset::create([
            'name' => 'Asset 3',
            'photo' => '',
            'number_of_stocks' => '0',
            'type' => 'Item',
            'supplier_id' => '1',
            'warehouse_id' => '2',
            'price' => '1500'
        ]);

    }
}
