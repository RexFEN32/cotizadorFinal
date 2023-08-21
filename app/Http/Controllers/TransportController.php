<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $Transports = Transport::all();
        return view('admin.transports.index', compact('Transports'));
    }

    public function create()
    {
        return view('admin.transports.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'transport' => 'required',
            'sku' => 'required',
        ];

        $messages = [
            'transport.required' => 'Escriba la Descripción de l tipo de Unidad',
            'sku.required' => 'Capture el valor del sku',
        ];

        $request->validate($rules, $messages);

        $Transports = new Transport();
        $Transports->transport = $request->transport;
        $Transports->sku = $request->sku;
        $Transports->save();

        return redirect()->route('transports.index')->with('create_reg', 'ok');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Transports = Transport::find($id);

        return view('admin.transports.show', compact('Transports'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'transport' => 'required',
            'sku' => 'required',
        ];

        $messages = [
            'transport.required' => 'Escriba la Descripción de l tipo de Unidad',
            'sku.required' => 'Capture el valor del sku',
        ];

        $request->validate($rules, $messages);

        $Transports = Transport::find($id);
        $Transports->transport = $request->transport;
        $Transports->sku = $request->sku;
        $Transports->save();

        return redirect()->route('transports.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Transport::destroy($id);

        return redirect()->route('transports.index')->with('eliminar', 'ok');
    }
}
