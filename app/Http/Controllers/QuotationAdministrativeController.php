<?php

namespace App\Http\Controllers;

use App\Models\PriceListAuxiliar;
use App\Models\QuotationAdministrative;
use Illuminate\Http\Request;

class QuotationAdministrativeController extends Controller
{
    public function selectivo_administratives_index($id)
    {
        $Quotation_Id = $id;

        return view('quotes.selectivo.administratives.index', compact(
            'Quotation_Id',
        ));
    }

    public function selectivo_administratives_store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'description' => 'required',
            'cost' => 'required',
        ];
        $messages = [
            'amount.required' => 'Capture la información solicitada',
            'description.required' => 'Capture la información solicitada',
            'cost.required' => 'Capture la información solicitada',
        ];
        $request->validate($rules,$messages);

        $PriceListAuxiliars = PriceListAuxiliar::where('description', 'ADMINISTRATIVO')->first();

        $UnitPrice = $request->cost * $PriceListAuxiliars->f_total;
        $TotalPrice = $request->amount * $UnitPrice;

        $Administratives = QuotationAdministrative::where('quotation_id', $request->Quotation_Id)->first();
        if($Administratives)
        {
            $Administratives = QuotationAdministrative::where('quotation_id', $request->Quotation_Id)->first();
            $Administratives->amount = $request->amount;
            $Administratives->description = $request->description;
            $Administratives->cost = $request->cost;            
            $Administratives->unit_price = $UnitPrice;
            $Administratives->total_price = $TotalPrice;
            $Administratives->save();
        }else
        {
            $Administratives = new QuotationAdministrative();
            $Administratives->quotation_id = $request->Quotation_Id;
            $Administratives->amount = $request->amount;
            $Administratives->description = $request->description;
            $Administratives->cost = $request->cost;            
            $Administratives->unit_price = $UnitPrice;
            $Administratives->total_price = $TotalPrice;
            $Administratives->save();
        }

        $Administratives = QuotationAdministrative::where('quotation_id', $request->Quotation_Id)->first();
        return view('quotes.selectivo.administratives.store', compact(
            'Administratives',
        ));
    }
    
    public function double_deep_administratives_index($id)
    {
        $Quotation_Id = $id;

        return view('quotes.double_deep.administratives.index', compact(
            'Quotation_Id',
        ));
    }

    public function double_deep_administratives_store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'description' => 'required',
            'cost' => 'required',
        ];
        $messages = [
            'amount.required' => 'Capture la información solicitada',
            'description.required' => 'Capture la información solicitada',
            'cost.required' => 'Capture la información solicitada',
        ];
        $request->validate($rules,$messages);

        $PriceListAuxiliars = PriceListAuxiliar::where('description', 'ADMINISTRATIVO')->first();

        $UnitPrice = $request->cost * $PriceListAuxiliars->f_total;
        $TotalPrice = $request->amount * $UnitPrice;

        $Administratives = QuotationAdministrative::where('quotation_id', $request->Quotation_Id)->first();
        if($Administratives)
        {
            $Administratives = QuotationAdministrative::where('quotation_id', $request->Quotation_Id)->first();
            $Administratives->amount = $request->amount;
            $Administratives->description = $request->description;
            $Administratives->cost = $request->cost;            
            $Administratives->unit_price = $UnitPrice;
            $Administratives->total_price = $TotalPrice;
            $Administratives->save();
        }else
        {
            $Administratives = new QuotationAdministrative();
            $Administratives->quotation_id = $request->Quotation_Id;
            $Administratives->amount = $request->amount;
            $Administratives->description = $request->description;
            $Administratives->cost = $request->cost;            
            $Administratives->unit_price = $UnitPrice;
            $Administratives->total_price = $TotalPrice;
            $Administratives->save();
        }

        $Administratives = QuotationAdministrative::where('quotation_id', $request->Quotation_Id)->first();
        return view('quotes.double_deep.administratives.store', compact(
            'Administratives',
        ));
    }

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
        //
    }

    public function show($id)
    {
        //
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
