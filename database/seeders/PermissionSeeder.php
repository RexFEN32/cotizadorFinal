<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permisssions = [
            'PANEL PRINCIPAL',
            'PANEL ADMINISTRATIVO',
            'CATALOGOS',

            'VER ROL',
            'CREAR ROL',
            'EDITAR ROL',
            'BORRAR ROL',
            
            'VER ZONA',
            'CREAR ZONA',
            'EDITAR ZONA',
            'BORRAR ZONA',
            
            'VER USUARIO',
            'CREAR USUARIO',
            'EDITAR USUARIO',
            'BORRAR USUARIO',
            
            'VER CLASIFICACION CLIENTE',
            'CREAR CLASIFICACION CLIENTE',
            'EDITAR CLASIFICACION CLIENTE',
            'BORRAR CLASIFICACION CLIENTE',
            
            'VER TIPOS CLIENTE',
            'CREAR TIPOS CLIENTE',
            'EDITAR TIPOS CLIENTE',
            'BORRAR TIPOS CLIENTE',
            
            'VER SECTOR',
            'CREAR SECTOR',
            'EDITAR SECTOR',
            'BORRAR SECTOR',
            
            'VER CLIENTE',
            'CREAR CLIENTE',
            'EDITAR CLIENTE',
            'MODIFICAR CLIENTE',
            'BORRAR CLIENTE',
        ];
        foreach($permisssions as $permisssion){
            Permission::create(['name'=>$permisssion]);
        }
    }
}
