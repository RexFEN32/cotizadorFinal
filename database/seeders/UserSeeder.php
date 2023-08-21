<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Usuario', 
            'email' => 'root@itinored.online', 
            'email_verified_at' => '2021/08/10', 
            'password' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
        DB::table('users')->insert([
            'name' => 'Administrador del Sistema', 
            'email' => 'admin@itinored.online', 
            'email_verified_at' => '2021/08/10', 
            'password' => '$2y$10$arcj2ZcemHQQInZVq5ZAvOlFrsqkaUryfASuEyVr2mi8E.3mdZGry',
            'created_at' => '2021/08/10 21:57:41', 
            'updated_at' => '2021/08/10 21:57:41'
        ]);
    }
}
