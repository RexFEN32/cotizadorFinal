<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:VER ROL|CREAR ROL|EDITAR ROL|BORRAR ROL',['only'=>['index']]);
        $this->middleware('permission:CREAR ROL',['only'=>['create', 'store']]);
        $this->middleware('permission:EDITAR ROL',['only'=>['edit', 'update']]);
        $this->middleware('permission:BORRAR ROL',['only'=>['destroy']]);
    }

    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();

        return view('admin.roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'permission' => 'required',
        ];

        $messages = [
            'name.required' => 'Escriba el nombre del Rol que desea Generar',
            'permission.required' => 'Seleccione por lo menos un permiso',
        ];

        $request->validate($rules, $messages);

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.show', compact(
            'role',
            'permission',
            'rolePermissions',
        ));

    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'permission' => 'required',
        ];

        $messages = [
            'name.required' => 'Escriba el nombre del Rol que desea Generar',
            'permission.required' => 'Seleccione por lo menos un permiso',
        ];

        $request->validate($rules, $messages);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();

        return redirect()->route('roles.index')->with('eliminar', 'ok');
    }
}
