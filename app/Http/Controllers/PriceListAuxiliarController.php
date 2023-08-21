<?php

namespace App\Http\Controllers;

use App\Models\PriceListAuxiliar;
use App\Models\Steel;
use Illuminate\Http\Request;

class PriceListAuxiliarController extends Controller
{
    public function index()
    {
        $PriceListAuxiliars = PriceListAuxiliar::all();
        return view('admin.price_list_auxiliars.index', compact('PriceListAuxiliars'));
    }

    public function create()
    {
        return view('admin.price_list_auxiliars.create');
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

        $PriceListAuxiliars = new PriceListAuxiliar();
        $PriceListAuxiliars->description = $request->description;
        $PriceListAuxiliars->type = $request->type;
        $PriceListAuxiliars->system = $request->system;
        $PriceListAuxiliars->cost = $request->cost;
        $PriceListAuxiliars->f_vta = $request->f_vta;
        $PriceListAuxiliars->f_desp = $request->f_desp;
        $PriceListAuxiliars->f_emb = $request->f_emb;
        $PriceListAuxiliars->f_desc = $request->f_desc;
        $PriceListAuxiliars->f_total = $F_Total;
        $PriceListAuxiliars->save();

        return redirect()->route('price_list_auxiliars.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $PriceListAuxiliars = PriceListAuxiliar::find($id);
        return view('admin.price_list_auxiliars.show', compact(
            'PriceListAuxiliars',
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

        $PriceListAuxiliars = PriceListAuxiliar::find($id);
        $PriceListAuxiliars->description = $request->description;
        $PriceListAuxiliars->type = $request->type;
        $PriceListAuxiliars->system = $request->system;
        $PriceListAuxiliars->cost = $request->cost;
        $PriceListAuxiliars->f_vta = $request->f_vta;
        $PriceListAuxiliars->f_desp = $request->f_desp;
        $PriceListAuxiliars->f_emb = $request->f_emb;
        $PriceListAuxiliars->f_desc = $request->f_desc;
        $PriceListAuxiliars->f_total = $F_Total;
        $PriceListAuxiliars->save();

        return redirect()->route('price_list_auxiliars.index')->with('update_reg', 'ok');  
    }

    public function destroy($id)
    {
        PriceListAuxiliar::destroy($id);

        return redirect()->route('price_list_auxiliars.index')->with('eliminar', 'ok');
    }
}
