<?php

namespace App\Http\Controllers;

use App\Models\PriceListInstall;
use App\Models\QuotationInstall;
use Illuminate\Http\Request;

class QuotationInstallController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la informacion requerida',
            'description.required' => 'Capture la informacion requerida',
        ];

        $request->validate($rules,$messages);
        $Quotation_Id = $request->Quotation_Id;
        $PriceListInstalls = PriceListInstall::where('description', $request->description)->first();
        $Import = $request->amount * $PriceListInstalls->cost * $PriceListInstalls->f_total;

        $QuotationInstalls = new QuotationInstall();
        $QuotationInstalls->quotation_id = $Quotation_Id;
        $QuotationInstalls->amount = $request->amount;
        $QuotationInstalls->description = $request->description;
        $QuotationInstalls->type = $PriceListInstalls->type;
        $QuotationInstalls->system = $PriceListInstalls->system;
        $QuotationInstalls->cost = $PriceListInstalls->cost;
        $QuotationInstalls->f_total = $PriceListInstalls->f_total;
        $QuotationInstalls->import = $Import;
        $QuotationInstalls->print = 'No';
        $QuotationInstalls->save();
                
        return redirect()->route('selectivo_installs', $Quotation_Id);
    }

    public function show($id)
    {
        $Quotation_Id = $id;
        $PriceListInstalls = PriceListInstall::all();
        return view('quotes.selectivo.installations.create', compact(
            'Quotation_Id',
            'PriceListInstalls',
        ));
    }

    public function double_deep_store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la informacion requerida',
            'description.required' => 'Capture la informacion requerida',
        ];

        $request->validate($rules,$messages);
        $Quotation_Id = $request->Quotation_Id;
        $PriceListInstalls = PriceListInstall::where('description', $request->description)->first();
        $Import = $request->amount * $PriceListInstalls->cost * $PriceListInstalls->f_total;

        $QuotationInstalls = new QuotationInstall();
        $QuotationInstalls->quotation_id = $Quotation_Id;
        $QuotationInstalls->amount = $request->amount;
        $QuotationInstalls->description = $request->description;
        $QuotationInstalls->type = $PriceListInstalls->type;
        $QuotationInstalls->system = $PriceListInstalls->system;
        $QuotationInstalls->cost = $PriceListInstalls->cost;
        $QuotationInstalls->f_total = $PriceListInstalls->f_total;
        $QuotationInstalls->import = $Import;
        $QuotationInstalls->print = 'No';
        $QuotationInstalls->save();
                
        return redirect()->route('double_deep_installs', $Quotation_Id);
    }
    
    public function double_deep_show($id)
    {
        $Quotation_Id = $id;
        $PriceListInstalls = PriceListInstall::all();
        return view('quotes.double_deep.installations.create', compact(
            'Quotation_Id',
            'PriceListInstalls',
        ));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
