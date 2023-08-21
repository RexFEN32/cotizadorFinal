<?php

namespace App\Http\Controllers;

use App\Models\PriceListScrew;
use Illuminate\Http\Request;

class PriceListScrewController extends Controller
{
    public function index()
    {
        $PriceListScrews = PriceListScrew::all();
        return view('admin.price_list_screws.index', compact('PriceListScrews'));
    }

    public function create()
    {
        return view('admin.price_list_screws.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'description' => 'required',
            'type' => 'required',
            'cost' => 'required',
            'f_vta' => 'required',
            'f_desp' => 'required',
            'f_emb' => 'required',
            'f_desc' => 'required',
        ];

        $messages = [
            'description.required' => 'Escriba la descripción',
            'type.required' => 'Capture el tipo',
            'cost.required' => 'Capture el Costo',
            'f_vta.required' => 'Escriba el Factor de Venta',
            'f_desp.required' => 'Escriba el Factor de Despiste',
            'f_emb.required' => 'Escriba el Factor de Embarque',
            'f_desc.required' => 'Escriba el Factor de Descuento',
        ];

        $request->validate($rules, $messages);

        $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;

        $PriceListScrews = new PriceListScrew();
        $PriceListScrews->description = $request->description;
        $PriceListScrews->type = $request->type;
        $PriceListScrews->cost = $request->cost;
        $PriceListScrews->f_vta = $request->f_vta;
        $PriceListScrews->f_desp = $request->f_desp;
        $PriceListScrews->f_emb = $request->f_emb;
        $PriceListScrews->f_desc = $request->f_desc;
        $PriceListScrews->f_total = $F_Total;
        $PriceListScrews->save();

        return redirect()->route('price_list_screws.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $PriceListScrews = PriceListScrew::find($id);
        return view('admin.price_list_screws.show', compact(
            'PriceListScrews',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'description' => 'required',
            'type' => 'required',
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
            'cost.required' => 'Capture la pieza',
            'f_vta.required' => 'Escriba el Factor de Venta',
            'f_desp.required' => 'Escriba el Factor de Despiste',
            'f_emb.required' => 'Escriba el Factor de Embarque',
            'f_desc.required' => 'Escriba el Factor de Descuento',
        ];

        $request->validate($rules, $messages);

        $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;

        $PriceListScrews = PriceListScrew::find($id);
        $PriceListScrews->description = $request->description;
        $PriceListScrews->type = $request->type;
        $PriceListScrews->cost = $request->cost;
        $PriceListScrews->f_vta = $request->f_vta;
        $PriceListScrews->f_desp = $request->f_desp;
        $PriceListScrews->f_emb = $request->f_emb;
        $PriceListScrews->f_desc = $request->f_desc;
        $PriceListScrews->f_total = $F_Total;
        $PriceListScrews->save();

        return redirect()->route('price_list_screws.index')->with('update_reg', 'ok');  
    }

    public function destroy($id)
    {
        PriceListScrew::destroy($id);

        return redirect()->route('price_list_screws.index')->with('eliminar', 'ok');
    }
}
