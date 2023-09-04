<?php

namespace App\Http\Controllers;

use App\Models\Joist;
use App\Models\PriceListAuxiliar;
use App\Models\Wood;
use Illuminate\Http\Request;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;
class WoodController extends Controller
{
    public function selectivo_woods_index($id)
    {
        $Joists = Joist::all();
        $Quotation_Id = $id;

        return view('quotes.selectivo.woods.index', compact(
            'Joists',
            'Quotation_Id',
        ));
    }

    public function selectivo_woods_store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'uncut_front' => 'required',
            'cut_front' => 'required',
            'uncut_background' => 'required',
            'cut_background' => 'required',
            'description' => 'required',
            'cost' => 'required',
            'joist_type' => 'required',
        ];
        $messages = [
            'amount.required' => 'Capture la información solicitada',
            'uncut_front.required' => 'Capture la información solicitada',
            'cut_front.required' => 'Capture la información solicitada',
            'uncut_background.required' => 'Capture la información solicitada',
            'cut_background.required' => 'Capture la información solicitada',
            'description.required' => 'Capture la información solicitada',
            'cost.required' => 'Capture la información solicitada',
            'joist_type.required' => 'Capture la información solicitada',
        ];
        $request->validate($rules,$messages);

        $PriceListAuxiliars = PriceListAuxiliar::where('description', 'MADERAS')->first();

        $UnitPrice = $request->cost * $PriceListAuxiliars->f_total;
        $TotalPrice = $request->amount * $UnitPrice;

        $Woods = Wood::where('quotation_id', $request->Quotation_Id)->first();
        if($Woods)
        {
            $Woods = Wood::where('quotation_id', $request->Quotation_Id)->first();
            $Woods->uncut_front = $request->uncut_front;
            $Woods->cut_front = $request->cut_front;
            $Woods->uncut_background = $request->uncut_background;
            $Woods->cut_background = $request->cut_background;
            $Woods->description = $request->description;
            $Woods->cost = $request->cost;
            $Woods->joist_type = $request->joist_type;
            $Woods->amount = $request->amount;
            $Woods->unit_price = $UnitPrice;
            $Woods->total_price = $TotalPrice;
            $Woods->save();
        }else
        {
            $Woods = new Wood();
            $Woods->quotation_id = $request->Quotation_Id;
            $Woods->uncut_front = $request->uncut_front;
            $Woods->cut_front = $request->cut_front;
            $Woods->uncut_background = $request->uncut_background;
            $Woods->cut_background = $request->cut_background;
            $Woods->description = $request->description;
            $Woods->cost = $request->cost;
            $Woods->joist_type = $request->joist_type;
            $Woods->amount = $request->amount;
            $Woods->unit_price = $UnitPrice;
            $Woods->total_price = $TotalPrice;
            $Woods->save();
        }

        $Woods = Wood::where('quotation_id', $request->Quotation_Id)->first();
        return view('quotes.selectivo.woods.store', compact(
            'Woods',
        ));
    }
    
    public function double_deep_woods_index($id)
    {
        $Joists = Joist::all();
        $Quotation_Id = $id;

        return view('quotes.double_deep.woods.index', compact(
            'Joists',
            'Quotation_Id',
        ));
    }

    public function double_deep_woods_store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'uncut_front' => 'required',
            'cut_front' => 'required',
            'uncut_background' => 'required',
            'cut_background' => 'required',
            'description' => 'required',
            'cost' => 'required',
            'joist_type' => 'required',
        ];
        $messages = [
            'amount.required' => 'Capture la información solicitada',
            'uncut_front.required' => 'Capture la información solicitada',
            'cut_front.required' => 'Capture la información solicitada',
            'uncut_background.required' => 'Capture la información solicitada',
            'cut_background.required' => 'Capture la información solicitada',
            'description.required' => 'Capture la información solicitada',
            'cost.required' => 'Capture la información solicitada',
            'joist_type.required' => 'Capture la información solicitada',
        ];
        $request->validate($rules,$messages);

        $PriceListAuxiliars = PriceListAuxiliar::where('description', 'MADERAS')->first();

        $UnitPrice = $request->cost * $PriceListAuxiliars->f_total;
        $TotalPrice = $request->amount * $UnitPrice;

        $Woods = Wood::where('quotation_id', $request->Quotation_Id)->first();
        if($Woods)
        {
            $Woods = Wood::where('quotation_id', $request->Quotation_Id)->first();
            $Woods->uncut_front = $request->uncut_front;
            $Woods->cut_front = $request->cut_front;
            $Woods->uncut_background = $request->uncut_background;
            $Woods->cut_background = $request->cut_background;
            $Woods->description = $request->description;
            $Woods->cost = $request->cost;
            $Woods->joist_type = $request->joist_type;
            $Woods->amount = $request->amount;
            $Woods->unit_price = $UnitPrice;
            $Woods->total_price = $TotalPrice;
            $Woods->save();
        }else
        {
            $Woods = new Wood();
            $Woods->quotation_id = $request->Quotation_Id;
            $Woods->uncut_front = $request->uncut_front;
            $Woods->cut_front = $request->cut_front;
            $Woods->uncut_background = $request->uncut_background;
            $Woods->cut_background = $request->cut_background;
            $Woods->description = $request->description;
            $Woods->cost = $request->cost;
            $Woods->joist_type = $request->joist_type;
            $Woods->amount = $request->amount;
            $Woods->unit_price = $UnitPrice;
            $Woods->total_price = $TotalPrice;
            $Woods->save();
        }

        $Woods = Wood::where('quotation_id', $request->Quotation_Id)->first();
        return view('quotes.double_deep.woods.store', compact(
            'Woods',
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