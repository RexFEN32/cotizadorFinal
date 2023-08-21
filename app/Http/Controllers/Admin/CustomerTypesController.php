<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerType;
use Illuminate\Http\Request;

class CustomerTypesController extends Controller
{

    public function index()
    {
        $customer_types = CustomerType::all();

        return view('admin.customer_types.index', compact('customer_types'));
    }

    public function create()
    {
        return view('admin.customer_types.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'customer_type' => 'required',
        ];

        $messages = [
            'customer_type.required' => 'Escriba el nombre de la Zona',
        ];

        $request->validate($rules, $messages);

        $Customer_Type = new CustomerType();
        $Customer_Type->customer_type = $request->customer_type;
        $Customer_Type->save();

        return redirect()->route('customer_types.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $customer_type = CustomerType::find($id);

        return view('admin.customer_types.show', compact(
            'customer_type',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'customer_type' => 'required',
        ];

        $messages = [
            'customer_type.required' => 'Escriba el nombre de la Zona',
        ];

        $request->validate($rules, $messages);

        $Customer_Type = CustomerType::find($id);
        $Customer_Type->customer_type = $request->customer_type;
        $Customer_Type->save();

        return redirect()->route('customer_types.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        CustomerType::destroy($id);

        return redirect()->route('customer_types.index')->with('eliminar', 'ok');
    }
}