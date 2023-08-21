<?php

namespace App\Http\Controllers;

use App\Models\PriceListInstall;
use Illuminate\Http\Request;

class PriceListInstallController extends Controller
{
    public function index()
    {
        $PriceListInstalls = PriceListInstall::all();
        return view('admin.price_list_installs.index', compact('PriceListInstalls'));
    }

    public function create()
    {
        return view('admin.price_list_installs.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'description' => 'required',
            'type' => 'required',
            'system' => 'required',
            'cost' => 'required',
            'f_vta' => 'required',
            'f_desp' => 'required',
            'f_emb' => 'required',
            'f_desc' => 'required',
        ];

        $messages = [
            'description.required' => 'Escriba la descripción',
            'type.required' => 'Capture el tipo',
            'system.required' => 'Capture el sistema',
            'cost.required' => 'Capture el Costo',
            'f_vta.required' => 'Escriba el Factor de Venta',
            'f_desp.required' => 'Escriba el Factor de Despiste',
            'f_emb.required' => 'Escriba el Factor de Embarque',
            'f_desc.required' => 'Escriba el Factor de Descuento',
        ];

        $request->validate($rules, $messages);

        $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;

        $PriceListInstalls = new PriceListInstall();
        $PriceListInstalls->description = $request->description;
        $PriceListInstalls->type = $request->type;
        $PriceListInstalls->system = $request->system;
        $PriceListInstalls->cost = $request->cost;
        $PriceListInstalls->f_vta = $request->f_vta;
        $PriceListInstalls->f_desp = $request->f_desp;
        $PriceListInstalls->f_emb = $request->f_emb;
        $PriceListInstalls->f_desc = $request->f_desc;
        $PriceListInstalls->f_total = $F_Total;
        $PriceListInstalls->save();

        return redirect()->route('price_list_installs.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $PriceListInstalls = PriceListInstall::find($id);
        return view('admin.price_list_installs.show', compact(
            'PriceListInstalls',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'description' => 'required',
            'type' => 'required',
            'system' => 'required',
            'cost' => 'required',
            'f_vta' => 'required',
            'f_desp' => 'required',
            'f_emb' => 'required',
            'f_desc' => 'required',
        ];

        $messages = [
            'description.required' => 'Escriba la descripción',
            'caliber.required' => 'Escriba el calibre',
            'type.required' => 'Capture el tipo',
            'system.required' => 'Capture el sistema',
            'cost.required' => 'Capture la pieza',
            'f_vta.required' => 'Escriba el Factor de Venta',
            'f_desp.required' => 'Escriba el Factor de Despiste',
            'f_emb.required' => 'Escriba el Factor de Embarque',
            'f_desc.required' => 'Escriba el Factor de Descuento',
        ];

        $request->validate($rules, $messages);

        $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;

        $PriceListInstalls = PriceListInstall::find($id);
        $PriceListInstalls->description = $request->description;
        $PriceListInstalls->type = $request->type;
        $PriceListInstalls->system = $request->system;
        $PriceListInstalls->cost = $request->cost;
        $PriceListInstalls->f_vta = $request->f_vta;
        $PriceListInstalls->f_desp = $request->f_desp;
        $PriceListInstalls->f_emb = $request->f_emb;
        $PriceListInstalls->f_desc = $request->f_desc;
        $PriceListInstalls->f_total = $F_Total;
        $PriceListInstalls->save();

        return redirect()->route('price_list_installs.index')->with('update_reg', 'ok');  
    }

    public function destroy($id)
    {
        PriceListInstall::destroy($id);

        return redirect()->route('price_list_installs.index')->with('eliminar', 'ok');
    }
}
