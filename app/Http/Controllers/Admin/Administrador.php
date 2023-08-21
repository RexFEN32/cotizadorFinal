<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class Administrador extends Controller
{
    public function index()
    {
        $Clientes = Customer::all();
        $Usuarios = User::all();

        return view('admin.index', compact(
            'Clientes',
            'Usuarios',
        ));
    }
}
