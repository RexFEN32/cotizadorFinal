<?php

namespace App\Http\Controllers;

use App\Models\PriceListUninstall;
use Illuminate\Http\Request;

class PriceListUninstallController extends Controller
{
    public function index()
    {
        $PriceListUninstalls = PriceListUninstall::all();
        return view('admin.price_list_uninstalls.index', compact('PriceListUninstalls'));
    }

    public function create()
    {
        return view('admin.price_list_uninstalls.create');
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

        $PriceListUninstalls = new PriceListUninstall();
        $PriceListUninstalls->description = $request->description;
        $PriceListUninstalls->type = $request->type;
        $PriceListUninstalls->system = $request->system;
        $PriceListUninstalls->cost = $request->cost;
        $PriceListUninstalls->f_vta = $request->f_vta;
        $PriceListUninstalls->f_desp = $request->f_desp;
        $PriceListUninstalls->f_emb = $request->f_emb;
        $PriceListUninstalls->f_desc = $request->f_desc;
        $PriceListUninstalls->f_total = $F_Total;
        $PriceListUninstalls->save();

        return redirect()->route('price_list_uninstalls.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $PriceListUninstalls = PriceListUninstall::find($id);
        return view('admin.price_list_uninstalls.show', compact(
            'PriceListUninstalls',
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

        $PriceListUninstalls = PriceListUninstall::find($id);
        $PriceListUninstalls->description = $request->description;
        $PriceListUninstalls->type = $request->type;
        $PriceListUninstalls->system = $request->system;
        $PriceListUninstalls->cost = $request->cost;
        $PriceListUninstalls->f_vta = $request->f_vta;
        $PriceListUninstalls->f_desp = $request->f_desp;
        $PriceListUninstalls->f_emb = $request->f_emb;
        $PriceListUninstalls->f_desc = $request->f_desc;
        $PriceListUninstalls->f_total = $F_Total;
        $PriceListUninstalls->save();

        return redirect()->route('price_list_uninstalls.index')->with('update_reg', 'ok');  
    }

    public function destroy($id)
    {
        PriceListUninstall::destroy($id);

        return redirect()->route('price_list_uninstalls.index')->with('eliminar', 'ok');
    }
}
