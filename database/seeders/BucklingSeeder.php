<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BucklingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bucklings')->insert([
            'buckling' => '0.91',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('bucklings')->insert([
            'buckling' => '1.22',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('bucklings')->insert([
            'buckling' => '1.52',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('bucklings')->insert([
            'buckling' => '1.83',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('bucklings')->insert([
            'buckling' => '2.13',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('bucklings')->insert([
            'buckling' => '2.44',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('bucklings')->insert([
            'buckling' => '2.74',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('bucklings')->insert([
            'buckling' => '3.05',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
    }
}
