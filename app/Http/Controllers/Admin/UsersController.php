<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserZone;
use App\Models\Zone;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    public function index()
    {
        $usuarios = User::where('id', '<>', '1')->get();

        return view('admin.users.index', compact(
            'usuarios',
        ));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $zones = Zone::pluck('zone', 'id')->all();

        return view('admin.users.create', compact(
            'roles',
            'zones',
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required',
            'zones' => 'required',
            'password' => 'required|same:confirm-password',
            
        ];

        $messages = [
            'name.required' => 'Escriba el nombre del Usuario que desea Generar',
            'email.required' => 'Escriba un Email',
            'email.unique' => 'El email capturado ya existe en el sistema',
            'email.email' => 'Escriba un Email válido',
            'roles.required' => 'Elija el Rol del Usuario',
            'zones.required' => 'Elija una Zona válida',
            'password.required' => 'La contraseña es obligatoria',
            'password.same' => 'Verifique la contraseña'
        ];

        $request->validate($rules, $messages);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $zones = $request->input('zones');
        $zone_id = $zones[0];
        $user = User::all()->last();
        $user_id = $user->id;

        $User_Zone = new UserZone();
        $User_Zone->user_id = $user_id;
        $User_Zone->zone_id = $zone_id;
        $User_Zone->save();

        return redirect()->route('users.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        $user_id = $id;
        $UserZones = UserZone::where('user_id', $user_id)->get();
        $Zonas = Zone::all();

        $roles = Role::pluck('name', 'name')->all();
        $zones = Zone::pluck('zone', 'id')->all();

        $usuarioRole = $usuario->roles->pluck('name', 'name')->all();

        if(count($UserZones) >= 1){
            foreach ($UserZones as $zones){
                $zone = $zones->zone_id;
                $Zoness = Zone::where('id', $zone)->get();
                
                foreach($Zoness as $Zones){
                    $zona = $Zones->zone;
                    $zona_id = $Zones->id;
                }
                
                $usuarioZone = $zona;
                $usuarioZoneid = $zona_id;
                //return $usuarioZone;
            }
        }else{
            
            $usuarioZone = "";
            $usuarioZoneid = "";
        }

        return view('admin.users.show', compact(
            'usuario',
            'roles',
            'usuarioRole',
            'zones',
            'usuarioZone',
            'usuarioZoneid',
            'Zonas',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ];

        $messages = [
            'name.required' => 'Escriba el nombre del Rol que desea Generar',
            'email.required' => 'required',
            'email.unique' => 'El email capturado ya existe en el sistema',
            'email.email' => 'Escriba un email válido',
            'roles.required' => 'Elija el Rol del Usuario',
        ];

        $request->validate($rules, $messages);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        $zones = $request->input('zones');
        $zone_id = $zones[0];
        $user_id = $user->id;

        $User_Zone = UserZone::where('user_id', $user_id)->get();

        if(count($User_Zone) == 0){
            $UserZones = new UserZone();
            $UserZones->user_id = $user_id;
            $UserZones->zone_id = $zone_id;
            $UserZones->save();
        }else{
            $UserZones = UserZone::where('user_id', $user_id)->first();
            $UserZones->zone_id = $zone_id;
            $UserZones->save();
        }

        return redirect()->route('users.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index')->with('eliminar', 'ok');
    }
}
