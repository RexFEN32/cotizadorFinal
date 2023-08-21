<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportSeeder extends Seeder
{
    public function run()
    {
        DB::table('transports')->insert([
            'transport' => 'Pequeña',
            'sku' => 'TC0000127632',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('transports')->insert([
            'transport' => '3.5 T',
            'sku' => 'TC0000127633',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('transports')->insert([
            'transport' => 'Torthon',
            'sku' => 'TC0000127634',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
        DB::table('transports')->insert([
            'transport' => 'Trailer',
            'sku' => 'TC0000127635',
            'created_at' => '2023/02/07 21:57:41', 
            'updated_at' => '2023/02/07 21:57:41'
        ]);
    }
}
