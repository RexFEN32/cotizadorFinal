<?php

namespace App\Http\Controllers;

use App\Models\DoubleDeepSpacer;
use App\Models\Spacer;
use Illuminate\Http\Request;

class DoubleDeepSpacerController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $Spacers = Spacer::all();

        return view('quotes.double_deep.spacers.index', compact('Spacers', 'Quotation_Id'));
    }

    public function calc(Request $request)
    {
        $rules = [
            'amount' => 'required',
        ];
        $messages = [
            'amount.required' => 'La cantidad de piezas es requerida',
        ];
        $request->validate($rules,$messages);
        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Piece = Spacer::find($request->piece);
        $SubTotal = $Amount * $Piece->price;

        $SS = DoubleDeepSpacer::where('quotation_id', $Quotation_Id)->first();
        if($SS){
            $SS->amount = $Amount;
            $SS->use = $Piece->use;
            $SS->developing = $Piece->developing;
            $SS->long = $Piece->length;
            $SS->caliber = $Piece->caliber;
            $SS->kg_m2 = $Piece->kg_m2;
            $SS->m2 = $Piece->m2;
            $SS->sku = $Piece->sku;
            $SS->unit_price = $Piece->price;
            $SS->total_price = $SubTotal;
            $SS->save();
        }else{
            $SS = new DoubleDeepSpacer();
            $SS->quotation_id = $Quotation_Id;
            $SS->amount = $Amount;
            $SS->use = $Piece->use;
            $SS->developing = $Piece->developing;
            $SS->long = $Piece->length;
            $SS->caliber = $Piece->caliber;
            $SS->kg_m2 = $Piece->kg_m2;
            $SS->m2 = $Piece->m2;
            $SS->sku = $Piece->sku;
            $SS->unit_price = $Piece->price;
            $SS->total_price = $SubTotal;
            $SS->save();
        }

        return view('quotes.double_deep.spacers.calc', compact(
            'Amount',
            'Piece',
            'SubTotal',
            'Quotation_Id'
        ));
    }
}
