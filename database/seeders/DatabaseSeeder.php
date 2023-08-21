<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(BucklingSeeder::class);
        $this->call(DepthSeeder::class);
        $this->call(HeightSeeder::class);
        $this->call(BucklingMiniSeeder::class);
        $this->call(DepthMiniSeeder::class);
        $this->call(HeightMiniSeeder::class);
        $this->call(BucklingStructuralSeeder::class);
        $this->call(DepthStructuralSeeder::class);
        $this->call(HeightStructuralSeeder::class);
        $this->call(FactorSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(DestinationSeeder::class);
    }
}
