<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\PriceList;
use App\Models\PriceListScrew;
use App\Models\SelectiveFloor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $Floor = Floor::all();

        return view('quotes.selectivo.floors.index', compact(
            'Floor', 
            'Quotation_Id'
        ));
    }

    public function calc(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'length' => 'required',
            'camber' => 'required',
        ];
        $messages = [
            'amount.required' => 'La cantidad de piezas es requerida',
            'length.required' => 'Seleccione el Largo',
            'camber.required' => 'Seleccione el Peralte',
        ];
        $request->validate($rules,$messages);
        $request;
        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Piece = Floor::where('length', $request->length)->where('camber', $request->camber)->first();
        if($Piece){
            $PriceLists = PriceList::where('piece', 'PISO')->where('description', 'LAMINA GALVANIZADA RC')->where('caliber', '14')->where('type','Galvanizada')->first();
            $Price = $Piece->price;
            $F_Total = $PriceLists->f_total;
            $PriceUnit = $Price * $F_Total;
            $LargoPiso = $Piece->length;
            if($LargoPiso <= '1.5'){
                $Tornillos = PriceListScrew::where('description', 'TORNILLO Y TUERCA 5/16 I X 5/8 IN G5 GALV')->first();
                $CostoTornillos = $Tornillos->cost * $Tornillos->f_total;
                $CantidadTornillos = $Amount * 6;
                $CostoTotalTornillos = $CantidadTornillos * $CostoTornillos;
            }elseif($LargoPiso >= '1.51' AND $LargoPiso <= '3'){
                $Tornillos = PriceListScrew::where('description', 'TORNILLO Y TUERCA 5/16 I X 5/8 IN G5 GALV')->first();
                $CostoTornillos = $Tornillos->cost * $Tornillos->f_total;
                $CantidadTornillos = $Amount * 8;
                $CostoTotalTornillos = $CantidadTornillos * $CostoTornillos;
            }else{
                $Tornillos = PriceListScrew::where('description', 'TORNILLO Y TUERCA 5/16 I X 5/8 IN G5 GALV')->first();
                $CostoTornillos = $Tornillos->cost * $Tornillos->f_total;
                $CantidadTornillos = $Amount * 10;
                $CostoTotalTornillos = $CantidadTornillos * $CostoTornillos;
            }
            $SubTotal = $Amount * $PriceUnit;

            $SF = SelectiveFloor::where('quotation_id', $Quotation_Id)->first();
            if($SF){
                $SF->amount = $Amount;
                $SF->length = $Piece->length;
                $SF->weight = $Piece->weight;
                $SF->m2 = $Piece->m2;
                $SF->camber = $Piece->camber;
                $SF->sku = $Piece->sku;
                $SF->unit_price = $PriceUnit;
                $SF->total_price = $SubTotal + $CostoTotalTornillos;
                $SF->save();
            }else{
                $SF = new SelectiveFloor();
                $SF->quotation_id = $Quotation_Id;
                $SF->amount = $Amount;
                $SF->length = $Piece->length;
                $SF->weight = $Piece->weight;
                $SF->m2 = $Piece->m2;
                $SF->camber = $Piece->camber;
                $SF->sku = $Piece->sku;
                $SF->unit_price = $PriceUnit;
                $SF->total_price = $SubTotal + $CostoTotalTornillos;
                $SF->save();
            }

            return view('quotes.selectivo.floors.calc', compact(
                'Amount',
                'Piece',
                'SubTotal',
                'Quotation_Id',
                'CantidadTornillos',
                'CostoTotalTornillos',
                'PriceUnit'
            ));
        }else{
            return redirect()->route('floors.show',$Quotation_Id)->with('no_existe', 'ok');
        }
    }


    public function add_carrito($id){
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SF')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = SelectiveFloor::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='PISO';
        $Cart_product->type='SF';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo',$Quotation_Id);
    }
}
