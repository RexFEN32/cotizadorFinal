<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BucklingMiniSeeder extends Seeder
{
    public function run()
    {
        DB::table('buckling_minis')->insert([
            'buckling_mini' => '1.22',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('buckling_minis')->insert([
            'buckling_mini' => '1.52',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('buckling_minis')->insert([
            'buckling_mini' => '1.83',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('buckling_minis')->insert([
            'buckling_mini' => '2.13',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
    }
}
