<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepthMiniSeeder extends Seeder
{
    public function run()
    {
        DB::table('depth_minis')->insert([
            'depth_mini' => '0.30',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depth_minis')->insert([
            'depth_mini' => '0.45',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depth_minis')->insert([
            'depth_mini' => '0.60',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depth_minis')->insert([
            'depth_mini' => '0.75',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depth_minis')->insert([
            'depth_mini' => '0.90',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depth_minis')->insert([
            'depth_mini' => '1.06',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depth_minis')->insert([
            'depth_mini' => '1.20',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
    }
}
