<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([VehiclesTableSeeder::class]);
        $this->call([TransportationsSeeder::class]);
        $this->call([SuppliersSeeder::class]);
        $this->call([WarehousesSeeder::class]);
        $this->call([AssetsSeeder::class]);
        $this->call([EmployeesSeeder::class]);
    }
}
