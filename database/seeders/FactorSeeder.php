<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactorSeeder extends Seeder
{
    public function run()
    {
        DB::table('factors')->insert([
            'description' => 'F. VTA',
            'factor' => '1.60',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('factors')->insert([
            'description' => 'F. DESPISTE',
            'factor' => '2.00',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('factors')->insert([
            'description' => 'F. EMBALAJE',
            'factor' => '1.015',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('factors')->insert([
            'description' => 'F. DOCTO',
            'factor' => '0.95',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
    }
}
