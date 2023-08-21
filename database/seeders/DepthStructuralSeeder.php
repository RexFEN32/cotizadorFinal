<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepthStructuralSeeder extends Seeder
{
    public function run()
    {
        DB::table('depth_structurals')->insert([
            'depth_structural' => '0.91',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depth_structurals')->insert([
            'depth_structural' => '1.06',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depth_structurals')->insert([
            'depth_structural' => '1.20',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
    }
}
