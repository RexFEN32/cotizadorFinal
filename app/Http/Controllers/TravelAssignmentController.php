<?php

namespace App\Http\Controllers;

use App\Models\TravelAssignment;
use Illuminate\Http\Request;
use App\Models\PriceList;
class TravelAssignmentController extends Controller
{
    public function index()
    {
        $TravelAssignments = TravelAssignment::all();
        return view('admin.travel_assignments.index', compact('TravelAssignments'));
    }

    public function create()
    {
        return view('admin.travel_assignments.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'description' => 'required',
            'unit' => 'required',
            'sku' => 'required',            
            'cost' => 'required',
         
        ];

        $messages = [
            'description.required' => 'Escriba la descripción del viático',
            'unit.required' => 'Seleccione el tipo de Unidad',
            'sku.required' => 'Escriba el SKU',
            'cost.required' => 'Capture el Costo',
            
        ];

        $request->validate($rules, $messages);
        $PriceList=PriceList::where('system','VIATICO')->first();
        
        $F_Total = ($PriceList->f_vta * $PriceList->f_desp * $PriceList->f_emb) / $PriceList->f_desc;

        
        $TravelAssignments = new TravelAssignment();
        $TravelAssignments->description = $request->description;
        $TravelAssignments->unit = $request->unit;
        $TravelAssignments->sku = $request->sku;
        $TravelAssignments->cost = $request->cost;
        $TravelAssignments->f_vta = $PriceList->f_vta;
        $TravelAssignments->f_desp = $PriceList->f_desp;
        $TravelAssignments->f_emb = $PriceList->f_emb;
        $TravelAssignments->f_desc = $PriceList->f_desc;
        $TravelAssignments->f_total = $F_Total;
        $TravelAssignments->save();

        return redirect()->route('travel_assignments.index')->with('create_reg', 'ok');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $TravelAssignments = TravelAssignment::find($id);
        return view('admin.travel_assignments.show', compact(
            'TravelAssignments',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'description' => 'required',
            'unit' => 'required',
            'sku' => 'required',            
            'cost' => 'required',
            'f_vta' => 'required',
            'f_desp' => 'required',
            'f_emb' => 'required',
            'f_desc' => 'required',
        ];

        $messages = [
            'description.required' => 'Escriba la descripción del viático',
            'unit.required' => 'Seleccione el tipo de Unidad',
            'sku.required' => 'Escriba el SKU',
            'cost.required' => 'Capture el Costo',
            'f_vta.required' => 'Escriba el Factor de Venta',
            'f_desp.required' => 'Escriba el Factor de Despiste',
            'f_emb.required' => 'Escriba el Factor de Embarque',
            'f_desc.required' => 'Escriba el Factor de Descuento',
        ];

        $request->validate($rules, $messages);

        $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;

        $TravelAssignments = TravelAssignment::find($id);
        $TravelAssignments->description = $request->description;
        $TravelAssignments->unit = $request->unit;
        $TravelAssignments->sku = $request->sku;
        $TravelAssignments->cost = $request->cost;
        $TravelAssignments->f_vta = $request->f_vta;
        $TravelAssignments->f_desp = $request->f_desp;
        $TravelAssignments->f_emb = $request->f_emb;
        $TravelAssignments->f_desc = $request->f_desc;
        $TravelAssignments->f_total = $F_Total;
        $TravelAssignments->save();

        return redirect()->route('travel_assignments.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        TravelAssignment::destroy($id);

        return redirect()->route('travel_assignments.index')->with('eliminar', 'ok');
    }
}
