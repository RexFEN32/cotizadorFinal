<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Transport;
use App\Models\PriceList;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $Destinations = Destination::all();
        return view('admin.destinations.index', compact('Destinations'));
    }

    public function create()
    {
        $Transports = Transport::all();
        return view('admin.destinations.create', compact(
            'Transports',
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'destination' => 'required',
            'state' => 'required',
            'unit' => 'required',
            'cost' => 'required',
        ];

        $messages = [
            'destination.required' => 'Escriba el Nombre del Destino',
            'state.required' => 'Escriba el Estado del Destino',
            'unit.required' => 'Seleccione el tipo de Unidad',
            'cost.required' => 'Capture el Costo',
        ];

        $request->validate($rules, $messages);
        $PriceList=PriceList::where('system','FLETE')->first();
        
        $F_Total = ($PriceList->f_vta * $PriceList->f_desp * $PriceList->f_emb) / $PriceList->f_desc;

        $Destinations = new Destination();
        $Destinations->destination = $request->destination;
        $Destinations->state = $request->state;
        $Destinations->unit = $request->unit;
        $Destinations->cost = $request->cost;
        $Destinations->f_vta = $PriceList->f_vta;
        $Destinations->f_desp = $PriceList->f_desp;
        $Destinations->f_emb = $PriceList->f_emb;
        $Destinations->f_desc = $PriceList->f_desc;
        $Destinations->f_total = $F_Total;
        $Destinations->save();

        return redirect()->route('destinations.index')->with('create_reg', 'ok');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Destinations = Destination::find($id);
        $Transports = Transport::pluck('transport', 'transport');
        return view('admin.destinations.show', compact(
            'Destinations', 
            'Transports',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'destination' => 'required',
            'state' => 'required',
            'unit' => 'required',
            'cost' => 'required',
            'f_vta' => 'required',
            'f_desp' => 'required',
            'f_emb' => 'required',
            'f_desc' => 'required',
        ];

        $messages = [
            'destination.required' => 'Escriba el Nombre del Destino',
            'state.required' => 'Escriba el Estado del Destino',
            'unit.required' => 'Seleccione el tipo de Unidad',
            'cost.required' => 'Capture el Costo',
            'f_vta.required' => 'Escriba el Factor de Venta',
            'f_desp.required' => 'Escriba el Factor de Despiste',
            'f_emb.required' => 'Escriba el Factor de Embarque',
            'f_desc.required' => 'Escriba el Factor de Descuento',
        ];

        $request->validate($rules, $messages);

        $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;

        $Destinations = Destination::find($id);
        $Destinations->destination = $request->destination;
        $Destinations->state = $request->state;
        $Destinations->unit = $request->unit;
        $Destinations->cost = $request->cost;
        $Destinations->f_vta = $request->f_vta;
        $Destinations->f_desp = $request->f_desp;
        $Destinations->f_emb = $request->f_emb;
        $Destinations->f_desc = $request->f_desc;
        $Destinations->f_total = $F_Total;
        $Destinations->save();

        return redirect()->route('destinations.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Destination::destroy($id);

        return redirect()->route('destinations.index')->with('eliminar', 'ok');
    }
}
