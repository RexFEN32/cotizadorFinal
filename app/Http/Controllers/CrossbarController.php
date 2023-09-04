<?php

namespace App\Http\Controllers;

use App\Models\Crossbar;
use App\Models\SelectiveCrossbar;
use Illuminate\Http\Request;

class CrossbarController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $Crossbars = Crossbar::where('id', '<>', '4')->get();

        return view('quotes.selectivo.crossbars.index', compact('Crossbars', 'Quotation_Id'));
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
            $ConConnector = 'Yes';
        }else{
            $Conector = '';
            $SubTotal = $Amount * $Piece->price;
            $ConConnector = 'No';
        }

        $ConConnector;

        $SCB = SelectiveCrossbar::where('quotation_id', $Quotation_Id)->first();
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
            if($ConConnector == 'No'){
                $SCB->connector = 0;
            }else{
                $SCB->connector = $Conector->price;
            }
            $SCB->sku = $Piece->sku;
            $SCB->unit_price = $Piece->price;
            $SCB->total_price = $SubTotal;
            $SCB->save();
        }else{
            $SCB = new SelectiveCrossbar();
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
            if($ConConnector = 'No'){
                $SCB->connector = 0;
            }else{
                $SCB->connector = $Conector->price;
            }            
            $SCB->sku = $Piece->sku;
            $SCB->unit_price = $Piece->price;
            $SCB->total_price = $SubTotal;
            $SCB->save();
        }

        return view('quotes.selectivo.crossbars.calc', compact(
            'Amount',
            'Piece',
            'SubTotal',
            'Conector',
            'Quotation_Id'
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
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SCB')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = SelectiveCrossbar::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='CROSSBAR';
        $Cart_product->type='SCB';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo',$Quotation_Id);
    }
}
