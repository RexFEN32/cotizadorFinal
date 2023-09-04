<?php

namespace App\Http\Controllers;

use App\Models\Joist;
use App\Models\PriceListScrew;
use App\Models\SelectiveJoistBox2;
use App\Models\SelectiveJoistBox2Caliber14;
use App\Models\TypeBox2Joist;
use App\Models\TypeBox2JoistCaliber;
use App\Models\TypeBox2JoistCamber;
use App\Models\TypeBox2JoistCrossbarLength;
use App\Models\TypeBox2JoistLength;
use App\Models\TypeBox2JoistLoadingCapacity;
use Illuminate\Http\Request;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;

class TypeBox2JoistController extends Controller
{
    public function caliber14_show($id)
    {
        $Quotation_Id = $id;
        $Joists = Joist::where('joist', 'Tipo Caja 2.0')->first();
        $Calibers = TypeBox2JoistCaliber::where('caliber', '14')->get();
        $Lengths = TypeBox2JoistLength::all();
        $Cambers = TypeBox2JoistCamber::all();
        $CrossbarLengths = TypeBox2JoistCrossbarLength::all();
        $LoadingCapacities = TypeBox2JoistLoadingCapacity::all();
        $TypeLJoists = TypeBox2Joist::where('caliber', '14')->get();

        return view('quotes.selectivo.joists.typebox2joists.caliber14.index', compact(
            'Joists',
            'Calibers',
            'Lengths',
            'Cambers',
            'CrossbarLengths',
            'LoadingCapacities',
            'TypeLJoists',
            'Quotation_Id'
        ));
    }

    public function caliber14_calc(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'weight' => 'required',
            'joist_type' => 'required',
            'caliber' => 'required',
        ];
        $messages = [
            'amount.required' => 'Capture una cantidad válida',
            'weight.required' => 'Capture la carga requerida',
            'joist_type.required' => 'Elija el tipo de Viga',
            'caliber.required' => 'Elija el Calibre de la Viga',
        ];
        $request->validate($rules, $messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Weight = $request->weight;
        $JoistType = $request->joist_type;
        $Length = $request->length;
        $Caliber = $request->caliber;
        $Increment = $Weight * 0.07;
        $WeightIncrement = $Weight + $Increment;
        $Cambers = TypeBox2JoistLoadingCapacity::where('crossbar_length', '>=', $Length)->where('loading_capacity', '>=', $WeightIncrement)->first();
        if($Cambers){
            $TypeLJoists = TypeBox2Joist::where('caliber','14')->where('camber', $Cambers->camber)->where('length', $Length)->first();
            $Import = $request->amount * $TypeLJoists->price;
            $Clavijas = PriceListScrew::where('description', 'CLAVIJA DE SEGURIDAD PARA VIGAS')->first();
            $CostoClavija = $Clavijas->cost * $Clavijas->f_total;
            $CantidadClavijas = $Amount * 2;
            $CostoTotalClavijas = $CantidadClavijas * $CostoClavija;

            $SJB2 = SelectiveJoistBox2Caliber14::where('quotation_id', $Quotation_Id)->first();
            if($SJB2){
                $SJB2->amount = $Amount;
                $SJB2->caliber = $Caliber;
                $SJB2->loading_capacity = $Weight;
                $SJB2->type_joist = $JoistType;
                $SJB2->length_meters = $Length;
                $SJB2->camber = $TypeLJoists->camber;
                $SJB2->weight_kg = $TypeLJoists->weight;
                $SJB2->m2 = $TypeLJoists->m2;
                $SJB2->length = $TypeLJoists->length;
                $SJB2->sku = $TypeLJoists->sku;
                $SJB2->unit_price = $TypeLJoists->price;
                $SJB2->total_price = $Import + $CostoTotalClavijas;
                $SJB2->save();
            }else{
                $SJB2 = new SelectiveJoistBox2Caliber14();
                $SJB2->quotation_id = $Quotation_Id;
                $SJB2->amount = $Amount;
                $SJB2->caliber = $Caliber;
                $SJB2->loading_capacity = $Weight;
                $SJB2->type_joist = $JoistType;
                $SJB2->length_meters = $Length;
                $SJB2->camber = $TypeLJoists->camber;
                $SJB2->weight_kg = $TypeLJoists->weight;
                $SJB2->m2 = $TypeLJoists->m2;
                $SJB2->length = $TypeLJoists->length;
                $SJB2->sku = $TypeLJoists->sku;
                $SJB2->unit_price = $TypeLJoists->price;
                $SJB2->total_price = $Import + $CostoTotalClavijas;
                $SJB2->save();
            }

            return view('quotes.selectivo.joists.typebox2joists.caliber14.store', compact(
                'Amount',
                'Weight',
                'JoistType',
                'Length',
                'Caliber',
                'WeightIncrement',
                'Cambers',
                'TypeLJoists',
                'Import',
                'Quotation_Id',
                'CantidadClavijas',
                'CostoTotalClavijas',
            ));
        }else{
            return redirect()->route('menujoists.show')->with('no_existe', 'ok');
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'length' => 'required',
            'camber' => 'required',
            'skate' => 'required',
            'weight' => 'required',
            'joist_type' => 'required',
        ];
        $messages = [
            'amount.required' => 'Capture una cantidad válida',
            'caliber.required' => 'Seleccione el Calibre de la Viga',
            'lenght.required' => 'Seleccione el Largo',
            'camber.required' => 'Seleccione el Peralte',
            'skate.required' => 'Capture el Patín',
            'weight.required' => 'Capture la Capacidad de carga',            
            'joist_type.required' => 'Seleccione el tipo de Viga',
        ];
        $request->validate($rules, $messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $Length = $request->length;
        $Camber = $request->camber;
        $Skate = $request->skate;
        $Weight = $request->weight;
        $JoistType = $request->joist_type;
        $Increment = $Weight * 0.07;
        $WeightIncrement = $Weight + $Increment;
        
        $TypeLJoists = TypeBox2Joist::where('caliber',$Caliber)->where('camber', $Camber)->where('length', $Length)->first();
        $Import = $Amount * $TypeLJoists->price;
        $Clavijas = PriceListScrew::where('description', 'CLAVIJA DE SEGURIDAD PARA VIGAS')->first();
        $CostoClavija = $Clavijas->cost * $Clavijas->f_total;
        $CantidadClavijas = $Amount * 2;
        $CostoTotalClavijas = $CantidadClavijas * $CostoClavija;

        $SJB2 = SelectiveJoistBox2::where('quotation_id', $Quotation_Id)->first();
            if($SJB2){
                $SJB2->amount = $Amount;
                $SJB2->caliber = $Caliber;
                $SJB2->skate = $Skate;
                $SJB2->loading_capacity = $Weight;
                $SJB2->type_joist = $JoistType;
                $SJB2->length_meters = $Length;
                $SJB2->camber = $TypeLJoists->camber;
                $SJB2->weight_kg = $TypeLJoists->weight;
                $SJB2->m2 = $TypeLJoists->m2;
                $SJB2->length = $TypeLJoists->length;
                $SJB2->sku = $TypeLJoists->sku;
                $SJB2->unit_price = $TypeLJoists->price;
                $SJB2->total_price = $Import + $CostoTotalClavijas;
                $SJB2->save();
            }else{
                $SJB2 = new SelectiveJoistBox2();
                $SJB2->quotation_id = $Quotation_Id;
                $SJB2->amount = $Amount;
                $SJB2->caliber = $Caliber;
                $SJB2->skate = $Skate;
                $SJB2->loading_capacity = $Weight;
                $SJB2->type_joist = $JoistType;
                $SJB2->length_meters = $Length;
                $SJB2->camber = $TypeLJoists->camber;
                $SJB2->weight_kg = $TypeLJoists->weight;
                $SJB2->m2 = $TypeLJoists->m2;
                $SJB2->length = $TypeLJoists->length;
                $SJB2->sku = $TypeLJoists->sku;
                $SJB2->unit_price = $TypeLJoists->price;
                $SJB2->total_price = $Import + $CostoTotalClavijas;
                $SJB2->save();
            }

        return view('quotes.selectivo.joists.typebox2joists.store', compact(
            'Amount',
            'Caliber',
            'Length',
            'Camber',
            'Skate',
            'Weight',
            'JoistType',
            'Increment',
            'WeightIncrement',
            'TypeLJoists',
            'Import',
            'Quotation_Id',
            'CantidadClavijas',
            'CostoTotalClavijas',
        ));
    }

    public function show($id)
    {
        $Quotation_Id = $id;
        $Joists = Joist::where('joist', 'Tipo Caja 2.0')->first();
        $Calibers = TypeBox2JoistCaliber::where('caliber', '<>', '14')->get();
        $Lengths = TypeBox2JoistLength::all();
        $Cambers = TypeBox2JoistCamber::all();
        $CrossbarLengths = TypeBox2JoistCrossbarLength::all();
        $LoadingCapacities = TypeBox2JoistLoadingCapacity::all();
        $TypeLJoists = TypeBox2Joist::all();

        return view('quotes.selectivo.joists.typebox2joists.index', compact(
            'Joists',
            'Calibers',
            'Lengths',
            'Cambers',
            'CrossbarLengths',
            'LoadingCapacities',
            'TypeLJoists',
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
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SJB2')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJB2 = SelectiveJoistBox2::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='VIGA TIPO BOX 2'.$SJB2->model;
        $Cart_product->type='SJB2';
        $Cart_product->unit_price=$SJB2->unit_price;
        $Cart_product->total_price=$SJB2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJB2->amount;
        $Cart_product->save();
        
        return redirect()->route('menujoists.show',$Quotation_Id);
    
    }
    
    public function add_carrito14($id){
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SJB214')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = SelectiveJoistBox2Caliber14::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='VIGA TIPO BOX 2 cal 14';
        $Cart_product->type='SJB214';
        $Cart_product->unit_price=$SJL2->unit_price;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('menujoists.show',$Quotation_Id);
    
    }
}