<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BucklingStructuralSeeder extends Seeder
{
    public function run()
    {
        DB::table('buckling_structurals')->insert([
            'buckling_structural' => '1.22',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('buckling_structurals')->insert([
            'buckling_structural' => '1.52',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('buckling_structurals')->insert([
            'buckling_structural' => '1.83',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('buckling_structurals')->insert([
            'buckling_structural' => '2.13',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('buckling_structurals')->insert([
            'buckling_structural' => '2.44',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('buckling_structurals')->insert([
            'buckling_structural' => '2.74',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
    }
}
