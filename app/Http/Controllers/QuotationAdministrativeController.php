<?php

namespace App\Http\Controllers;

use App\Models\PriceListAuxiliar;
use App\Models\QuotationAdministrative;
use Illuminate\Http\Request;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;

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
    public function add_carrito($id){
        $Quotation_Id = $id;
    $Quotation=Quotation::find($id);
    //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
    $cartSHLF = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SAD')->first();
    if($cartSHLF){
        Cart_product::destroy($cartSHLF->id);
    }
    //agregar el nuevo al carrito, lo que este en 
    $SHLF = QuotationAdministrative::where('quotation_id', $Quotation_Id)->first();
    //guardar en el carrito
    $Cart_product= new Cart_product();
    $Cart_product->name='ADMINISTRATIVO '.$SHLF->model;
    $Cart_product->type='SAD';
    $Cart_product->unit_price=$SHLF->total_price;
    $Cart_product->total_price=$SHLF->total_price;
    $Cart_product->quotation_id=$Quotation_Id;
    $Cart_product->user_id=Auth::user()->id;
    $Cart_product->amount=1;
    $Cart_product->save();
    
    return redirect()->route('selectivo.show',$Quotation_Id);
    }
}
