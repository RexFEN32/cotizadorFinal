<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerClassification;
use Illuminate\Http\Request;

class CustomerClassificationsController extends Controller
{

    public function index()
    {
        $customer_classifications = CustomerClassification::all();

        return view('admin.customer_classifications.index', compact('customer_classifications'));
    }

    public function create()
    {
        return view('admin.customer_classifications.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'customer_classification' => 'required',
        ];

        $messages = [
            'customer_classification.required' => 'Escriba el nombre de la Zona',
        ];

        $request->validate($rules, $messages);

        $Customer_Classification = new CustomerClassification();
        $Customer_Classification->customer_classification = $request->customer_classification;
        $Customer_Classification->save();

        return redirect()->route('customer_classifications.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $customer_classification = CustomerClassification::find($id);

        return view('admin.customer_classifications.show', compact(
            'customer_classification',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'customer_classification' => 'required',
        ];

        $messages = [
            'customer_classification.required' => 'Escriba el nombre de la Zona',
        ];

        $request->validate($rules, $messages);

        $Customer_Classification = CustomerClassification::find($id);
        $Customer_Classification->customer_classification = $request->customer_classification;
        $Customer_Classification->save();

        return redirect()->route('customer_classifications.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        CustomerClassification::destroy($id);

        return redirect()->route('customer_classifications.index')->with('eliminar', 'ok');
    }
}
