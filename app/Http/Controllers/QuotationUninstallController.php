<?php

namespace App\Http\Controllers;

use App\Models\PriceListInstall;
use App\Models\PriceListUninstall;
use App\Models\QuotationUninstall;
use Illuminate\Http\Request;

class QuotationUninstallController extends Controller
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
        $PriceListUninstalls = PriceListUninstall::where('description', $request->description)->first();
        $Import = $request->amount * $PriceListUninstalls->cost * $PriceListUninstalls->f_total;

        $QuotationUninstalls = new QuotationUninstall();
        $QuotationUninstalls->quotation_id = $Quotation_Id;
        $QuotationUninstalls->amount = $request->amount;
        $QuotationUninstalls->description = $request->description;
        $QuotationUninstalls->type = $PriceListUninstalls->type;
        $QuotationUninstalls->system = $PriceListUninstalls->system;
        $QuotationUninstalls->cost = $PriceListUninstalls->cost;
        $QuotationUninstalls->f_total = $PriceListUninstalls->f_total;
        $QuotationUninstalls->import = $Import;
        $QuotationUninstalls->print = 'No';
        $QuotationUninstalls->save();
                
        return redirect()->route('selectivo_installs', $Quotation_Id);
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
        $PriceListUninstalls = PriceListUninstall::where('description', $request->description)->first();
        $Import = $request->amount * $PriceListUninstalls->cost * $PriceListUninstalls->f_total;

        $QuotationUninstalls = new QuotationUninstall();
        $QuotationUninstalls->quotation_id = $Quotation_Id;
        $QuotationUninstalls->amount = $request->amount;
        $QuotationUninstalls->description = $request->description;
        $QuotationUninstalls->type = $PriceListUninstalls->type;
        $QuotationUninstalls->system = $PriceListUninstalls->system;
        $QuotationUninstalls->cost = $PriceListUninstalls->cost;
        $QuotationUninstalls->f_total = $PriceListUninstalls->f_total;
        $QuotationUninstalls->import = $Import;
        $QuotationUninstalls->print = 'No';
        $QuotationUninstalls->save();
                
        return redirect()->route('double_deep_installs', $Quotation_Id);
    }

    public function show($id)
    {
        $Quotation_Id = $id;
        $PriceListUninstalls = PriceListUninstall::all();
        return view('quotes.selectivo.installations.create_uninstalls', compact(
            'Quotation_Id',
            'PriceListUninstalls',
        ));
    }

    public function double_deep_show($id)
    {
        $Quotation_Id = $id;
        $PriceListUninstalls = PriceListUninstall::all();
        return view('quotes.double_deep.installations.create_uninstalls', compact(
            'Quotation_Id',
            'PriceListUninstalls',
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
