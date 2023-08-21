<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    public function run()
    {
        DB::table('destinations')->insert([
            'destination' => 'Tultitlán',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Tultepec',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Tlalnepantla',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Ecatepec',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Cuautitlán',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Vallejo',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Iztapalapa',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Querétaro',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'León',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Monterrey',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('destinations')->insert([
            'destination' => 'Guadalajara',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
    }
}
