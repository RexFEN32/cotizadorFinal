<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function index()
    {
        $Factors = Factor::all();
        return view('admin.factors.index', compact('Factors'));
    }

    public function create()
    {
        return view('admin.factors.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'description' => 'required',
            'factor' => 'required',
        ];

        $messages = [
            'description.required' => 'Escriba la Descripción del Factor',
            'factor.required' => 'Capture el valor del Factor',
        ];

        $request->validate($rules, $messages);

        $Factors = new Factor();
        $Factors->description = $request->description;
        $Factors->factor = $request->factor;
        $Factors->save();

        return redirect()->route('factors.index')->with('create_reg', 'ok');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Factors = Factor::find($id);

        return view('admin.factors.show', compact('Factors'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'description' => 'required',
            'factor' => 'required',
        ];

        $messages = [
            'description.required' => 'Escriba la Descripción del Factor',
            'factor.required' => 'Capture el valor del Factor',
        ];

        $request->validate($rules, $messages);

        $Factors = Factor::find($id);
        $Factors->description = $request->description;
        $Factors->factor = $request->factor;
        $Factors->save();

        return redirect()->route('factors.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Factor::destroy($id);

        return redirect()->route('factors.index')->with('eliminar', 'ok');
    }
}
