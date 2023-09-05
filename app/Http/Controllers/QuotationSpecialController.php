<?php

namespace App\Http\Controllers;

use App\Models\PriceListAuxiliar;
use App\Models\QuotationSpecial;
use Illuminate\Http\Request;

class QuotationSpecialController extends Controller
{
    public function selectivo_special_index($id)
    {
        $Quotation_Id = $id;

        return view('quotes.selectivo.specials.index', compact(
            'Quotation_Id',
        ));
    }

    public function selectivo_special_store(Request $request)
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

        $PriceListAuxiliars = PriceListAuxiliar::where('description', 'ESPECIAL')->first();

        $UnitPrice = $request->cost * $PriceListAuxiliars->f_total;
        $TotalPrice = $request->amount * $UnitPrice;

        $Special = QuotationSpecial::where('quotation_id', $request->Quotation_Id)->first();
        if($Special)
        {
            $Special = QuotationSpecial::where('quotation_id', $request->Quotation_Id)->first();
            $Special->amount = $request->amount;
            $Special->description = $request->description;
            $Special->cost = $request->cost;            
            $Special->unit_price = $UnitPrice;
            $Special->total_price = $TotalPrice;
            $Special->save();
        }else
        {
            $Special = new QuotationSpecial();
            $Special->quotation_id = $request->Quotation_Id;
            $Special->amount = $request->amount;
            $Special->description = $request->description;
            $Special->cost = $request->cost;            
            $Special->unit_price = $UnitPrice;
            $Special->total_price = $TotalPrice;
            $Special->save();
        }

        $Special = QuotationSpecial::where('quotation_id', $request->Quotation_Id)->first();
        return view('quotes.selectivo.specials.store', compact(
            'Special',
        ));
    }
    
    public function double_deep_special_index($id)
    {
        $Quotation_Id = $id;

        return view('quotes.double_deep.specials.index', compact(
            'Quotation_Id',
        ));
    }

    public function double_deep_special_store(Request $request)
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

        $PriceListAuxiliars = PriceListAuxiliar::where('description', 'ESPECIAL')->first();

        $UnitPrice = $request->cost * $PriceListAuxiliars->f_total;
        $TotalPrice = $request->amount * $UnitPrice;

        $Special = QuotationSpecial::where('quotation_id', $request->Quotation_Id)->first();
        if($Special)
        {
            $Special = QuotationSpecial::where('quotation_id', $request->Quotation_Id)->first();
            $Special->amount = $request->amount;
            $Special->description = $request->description;
            $Special->cost = $request->cost;            
            $Special->unit_price = $UnitPrice;
            $Special->total_price = $TotalPrice;
            $Special->save();
        }else
        {
            $Special = new QuotationSpecial();
            $Special->quotation_id = $request->Quotation_Id;
            $Special->amount = $request->amount;
            $Special->description = $request->description;
            $Special->cost = $request->cost;            
            $Special->unit_price = $UnitPrice;
            $Special->total_price = $TotalPrice;
            $Special->save();
        }

        $Special = QuotationSpecial::where('quotation_id', $request->Quotation_Id)->first();
        return view('quotes.double_deep.specials.store', compact(
            'Special',
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
    public function add_carrito($id){
        $Quotation_Id = $id;
    $Quotation=Quotation::find($id);
    //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
    $cartSHLF = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SSP')->first();
    if($cartSHLF){
        Cart_product::destroy($cartSHLF->id);
    }
    //agregar el nuevo al carrito, lo que este en 
    $SHLF = QuotationSpecial::where('quotation_id', $Quotation_Id)->first();
    //guardar en el carrito
    $Cart_product= new Cart_product();
    $Cart_product->name='ESPECIAL '.$SHLF->model;
    $Cart_product->type='SSP';
    $Cart_product->unit_price=$SHLF->total_price;
    $Cart_product->total_price=$SHLF->total_price;
    $Cart_product->quotation_id=$Quotation_Id;
    $Cart_product->user_id=Auth::user()->id;
    $Cart_product->amount=1;
    $Cart_product->save();
    
    return redirect()->route('selectivo.show',$Quotation_Id);
    }
}