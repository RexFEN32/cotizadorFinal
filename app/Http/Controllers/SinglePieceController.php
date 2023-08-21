<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\SinglePiece;
use Illuminate\Http\Request;

class SinglePieceController extends Controller
{
    public function index()
    {
        //
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
        $Amount = $request->amount;
        $Piece = SinglePiece::find($request->piece);
        $SubTotal = $Amount * $Piece->price;
        $Quotation_Id = $request->Quotation_Id;

        return view('quotes.single_pieces.calc', compact(
            'Amount',
            'Piece',
            'SubTotal',
            'Quotation_Id',
        ));
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
        $Quotation_Id = $id;
        $Quotations = Quotation::find($id);
        $Quotations->type = "PIEZAS INDIVIDUALES";
        $Quotations->save();

        $SinglePieces = SinglePiece::all();

        return view('quotes.single_pieces.index', compact('SinglePieces', 'Quotation_Id'));
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
