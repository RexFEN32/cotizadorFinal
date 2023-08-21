<?php

namespace App\Http\Controllers;

use App\Models\Crossbar;
use App\Models\DoubleDeepCrossbar;
use Illuminate\Http\Request;

class DoubleDeepCrossbarController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $Crossbars = Crossbar::where('id', '<>', '4')->get();

        return view('quotes.double_deep.crossbars.index', compact('Crossbars', 'Quotation_Id'));
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
        $Piece = Crossbar::find($request->piece);
        if($request->conector == 4){
            $Conector = Crossbar::where('type', 'CONECTOR DE CROSS BAR')->first();
            $SubTotal = ($Amount * $Piece->price)+$Conector->price;
        }else{
            $Conector = '0';
            $SubTotal = $Amount * $Piece->price;
        }

        $SCB = DoubleDeepCrossbar::where('quotation_id', $Quotation_Id)->first();
        if($SCB){
            $SCB->amount = $Amount;
            $SCB->type = $Piece->type;
            $SCB->depth = $Piece->depth;
            $SCB->developing = $Piece->developing;
            $SCB->long = $Piece->length;
            $SCB->caliber = $Piece->caliber;
            $SCB->kg_m2 = $Piece->kg_m2;
            $SCB->weight = $Piece->weight;
            $SCB->m2 = $Piece->m2;
            $SCB->connector = $Conector->price;
            $SCB->sku = $Piece->sku;
            $SCB->unit_price = $Piece->price;
            $SCB->total_price = $SubTotal;
            $SCB->save();
        }else{
            $SCB = new DoubleDeepCrossbar();
            $SCB->quotation_id = $Quotation_Id;
            $SCB->amount = $Amount;
            $SCB->type = $Piece->type;
            $SCB->depth = $Piece->depth;
            $SCB->developing = $Piece->developing;
            $SCB->long = $Piece->length;
            $SCB->caliber = $Piece->caliber;
            $SCB->kg_m2 = $Piece->kg_m2;
            $SCB->weight = $Piece->weight;
            $SCB->m2 = $Piece->m2;
            $SCB->connector = $Conector->price;
            $SCB->sku = $Piece->sku;
            $SCB->unit_price = $Piece->price;
            $SCB->total_price = $SubTotal;
            $SCB->save();
        }

        return view('quotes.double_deep.crossbars.calc', compact(
            'Amount',
            'Piece',
            'SubTotal',
            'Conector',
            'Quotation_Id'
        ));
    }
}
