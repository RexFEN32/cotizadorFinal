<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZonesController extends Controller
{

    public function index()
    {
        $zones = Zone::all();

        return view('admin.zones.index', compact('zones'));
    }

    public function create()
    {
        return view('admin.zones.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'zone' => 'required',
            'observations' => 'required',
        ];

        $messages = [
            'zone.required' => 'Escriba el nombre de la Zona',
            'observations.required' => 'Escriba la Descripción de la Zona',
        ];

        $request->validate($rules, $messages);

        $zone = new Zone();
        $zone->zone = $request->zone;
        $zone->observations = $request->observations;
        $zone->save();

        return redirect()->route('zones.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $zone = Zone::find($id);

        return view('admin.zones.show', compact(
            'zone',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'zone' => 'required',
            'observations' => 'required',
        ];

        $messages = [
            'zone.required' => 'Escriba el nombre de la Zona',
            'observations.required' => 'Escriba la Descripción de la Zona',
        ];

        $request->validate($rules, $messages);

        $zone = Zone::find($id);
        $zone->zone = $request->zone;
        $zone->observations = $request->observations;
        $zone->save();

        return redirect()->route('zones.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Zone::destroy($id);

        return redirect()->route('zones.index')->with('eliminar', 'ok');
    }
}
