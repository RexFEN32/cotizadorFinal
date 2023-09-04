<?php

namespace App\Http\Controllers;

use App\Models\FloorReinforcement;
use App\Models\PriceList;
use App\Models\SelectiveFloorReinforcement;
use Illuminate\Http\Request;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;
class FloorReinforcementController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $FloorReinforcements = FloorReinforcement::all();

        return view('quotes.selectivo.floor_reinforcements.index', compact(
            'FloorReinforcements', 
            'Quotation_Id'
        ));
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
        $Piece = FloorReinforcement::find($request->piece);
        $PriceLists = PriceList::where('piece', 'REFUERZO DE PISO')->where('description', 'LAMINA GALVANIZADA RC')->where('caliber', '14')->where('type','Galvanizada')->first();
        $Price = $Piece->price;
        $F_Total = $PriceLists->f_total;
        $PriceUnit = $Price * $F_Total;
        $SubTotal = $Amount * $PriceUnit;

        $SFR = SelectiveFloorReinforcement::where('quotation_id', $Quotation_Id)->first();
        if($SFR){
            $SFR->amount = $Amount;
            $SFR->height = $Piece->length;
            $SFR->weight = $Piece->weight;
            $SFR->m2 = $Piece->m2;
            $SFR->sku = $Piece->sku;
            $SFR->unit_price = $PriceUnit;
            $SFR->total_price = $SubTotal;
            $SFR->save();
        }else{
            $SFR = new SelectiveFloorReinforcement();
            $SFR->quotation_id = $Quotation_Id;
            $SFR->amount = $Amount;
            $SFR->height = $Piece->length;
            $SFR->weight = $Piece->weight;
            $SFR->m2 = $Piece->m2;
            $SFR->sku = $Piece->sku;
            $SFR->unit_price = $PriceUnit;
            $SFR->total_price = $SubTotal;
            $SFR->save();
        }

        return view('quotes.selectivo.floor_reinforcements.calc', compact(
            'Amount',
            'Piece',
            'SubTotal',
            'Quotation_Id',
            'PriceUnit',
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
    public function add_carrito($id){
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SFR')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = SelectiveFloorReinforcement::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='REFUERZO DE PISOS';
        $Cart_product->type='SFR';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo',$Quotation_Id);
    }
}
