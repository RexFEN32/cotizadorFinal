<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepthSeeder extends Seeder
{
    public function run()
    {
        DB::table('depths')->insert([
            'depth' => '0.91',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depths')->insert([
            'depth' => '1.06',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('depths')->insert([
            'depth' => '1.20',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
    }
}
