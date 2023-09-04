<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use App\Models\PriceListScrew;
use App\Models\SelectiveSpacer;
use App\Models\Spacer;
use Illuminate\Http\Request;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;
class SpacerController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $Spacers = Spacer::all();

        return view('quotes.selectivo.spacers.index', compact('Spacers', 'Quotation_Id'));
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
        $PriceLists = PriceList::where('piece', 'DISTANCIADORES')->where('description', 'LAMINA GALVANIZADA RC')->where('caliber', '12')->where('type','Galvanizada')->first();
        $Price = $Piece->price;
        $F_Total = $PriceLists->f_total;
        $PriceUnit = $Price * $F_Total;
        $SubTotal = $Amount * $PriceUnit;
        $Tornillos = PriceListScrew::where('description', 'TORNILLO Y TUERCA 5/16 I X 5/8 IN G5 GALV')->first();
        $CostoTornillos = $Tornillos->cost * $Tornillos->f_total;
        $CantidadTornillos = $Amount * 4;
        $CostoTotalTornillos = $CantidadTornillos * $CostoTornillos;

        $SS = SelectiveSpacer::where('quotation_id', $Quotation_Id)->first();
        if($SS){
            $SS->amount = $Amount;
            $SS->use = $Piece->use;
            $SS->developing = $Piece->developing;
            $SS->long = $Piece->length;
            $SS->caliber = $Piece->caliber;
            $SS->kg_m2 = $Piece->kg_m2;
            $SS->m2 = $Piece->m2;
            $SS->sku = $Piece->sku;
            $SS->unit_price = $PriceUnit;
            $SS->total_price = $SubTotal + $CostoTotalTornillos;
            $SS->save();
        }else{
            $SS = new SelectiveSpacer();
            $SS->quotation_id = $Quotation_Id;
            $SS->amount = $Amount;
            $SS->use = $Piece->use;
            $SS->developing = $Piece->developing;
            $SS->long = $Piece->length;
            $SS->caliber = $Piece->caliber;
            $SS->kg_m2 = $Piece->kg_m2;
            $SS->m2 = $Piece->m2;
            $SS->sku = $Piece->sku;
            $SS->unit_price = $PriceUnit;
            $SS->total_price = $SubTotal + $CostoTotalTornillos;
            $SS->save();
        }

        return view('quotes.selectivo.spacers.calc', compact(
            'Amount',
            'Piece',
            'SubTotal',
            'Quotation_Id',
            'CantidadTornillos',
            'CostoTotalTornillos',
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
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SS')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = SelectiveSpacer::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='ESPACIADOR';
        $Cart_product->type='SS';
        $Cart_product->unit_price=$SJL2->total_price;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo',$Quotation_Id);
    }
}
