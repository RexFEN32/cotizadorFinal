<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorsController extends Controller
{

    public function index()
    {
        $sectors = Sector::all();

        return view('admin.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('admin.sectors.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'sector' => 'required',
        ];

        $messages = [
            'sector.required' => 'Escriba el nombre de la Zona',
        ];

        $request->validate($rules, $messages);

        $sector = new Sector();
        $sector->sector = $request->sector;
        $sector->save();

        return redirect()->route('sectors.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sector = Sector::find($id);

        return view('admin.sectors.show', compact(
            'sector',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'sector' => 'required',
        ];

        $messages = [
            'sector.required' => 'Escriba el nombre de la Zona',
        ];

        $request->validate($rules, $messages);

        $sector = Sector::find($id);
        $sector->sector = $request->sector;
        $sector->save();

        return redirect()->route('sectors.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Sector::destroy($id);

        return redirect()->route('sectors.index')->with('eliminar', 'ok');
    }
}
