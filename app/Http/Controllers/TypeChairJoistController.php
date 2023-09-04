<?php

namespace App\Http\Controllers;

use App\Models\Joist;
use App\Models\PriceListScrew;
use App\Models\SelectiveJoistChair;
use App\Models\TypeChairJoist;
use App\Models\TypeChairJoistCaliber;
use App\Models\TypeChairJoistCamber;
use App\Models\TypeChairJoistCrossbarLength;
use App\Models\TypeChairJoistLength;
use App\Models\TypeChairJoistLoadingCapacity;
use Illuminate\Http\Request;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;


class TypeChairJoistController extends Controller
{
    // public function caliber14_show($id)
    // {
    //     $Quotation_Id = $id;
    //     $Joists = Joist::where('joist', 'Tipo Silla')->first();
    //     $Calibers = TypeChairJoistCaliber::where('caliber', '14')->get();
    //     $Lengths = TypeChairJoistLength::all();
    //     $Cambers = TypeChairJoistCamber::all();
    //     $CrossbarLengths = TypeChairJoistCrossbarLength::all();
    //     $LoadingCapacities = TypeChairJoistLoadingCapacity::all();
    //     $TypeLJoists = TypeChairJoist::where('caliber', '14')->get();

    //     return view('quotes.selectivo.joists.typechairjoists.caliber14.index', compact(
    //         'Joists',
    //         'Calibers',
    //         'Lengths',
    //         'Cambers',
    //         'CrossbarLengths',
    //         'LoadingCapacities',
    //         'TypeLJoists',
    //         'Quotation_Id'
    //     ));
    // }

    // public function caliber14_calc(Request $request)
    // {
    //     $rules = [
    //         'amount' => 'required',
    //         'weight' => 'required',
    //         'joist_type' => 'required',
    //         'caliber' => 'required',
    //     ];
    //     $messages = [
    //         'amount.required' => 'Capture una cantidad válida',
    //         'weight.required' => 'Capture la carga requerida',
    //         'joist_type.required' => 'Elija el tipo de Viga',
    //         'caliber.required' => 'Elija el Calibre de la Viga',
    //     ];
    //     $request->validate($rules, $messages);

    //     $Quotation_Id = $request->Quotation_Id;
    //     $Amount = $request->amount;
    //     $Weight = $request->weight;
    //     $JoistType = $request->joist_type;
    //     $Length = $request->length;
    //     $Caliber = $request->caliber;
    //     $Increment = $Weight * 0.07;
    //     $WeightIncrement = $Weight + $Increment;
    //     $Cambers = TypeChairJoistLoadingCapacity::where('crossbar_length', '>=', $Length)->where('loading_capacity', '>=', $WeightIncrement)->first();
    //     if($Cambers){
    //         $TypeLJoists = TypeChairJoist::where('caliber','14')->where('camber', $Cambers->camber)->where('length', $Length)->first();
    //         $Import = $request->amount * $TypeLJoists->price;

    //         return view('quotes.selectivo.joists.typechairjoists.caliber14.store', compact(
    //             'Amount',
    //             'Weight',
    //             'JoistType',
    //             'Length',
    //             'Caliber',
    //             'WeightIncrement',
    //             'Cambers',
    //             'TypeLJoists',
    //             'Import',
    //             'Quotation_Id'
    //         ));
    //     }else{
    //         return redirect()->route('menujoists.show')->with('no_existe', 'ok');
    //     }        
    // }

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
        
        $TypeLJoists = TypeChairJoist::where('caliber',$Caliber)->where('camber', $Camber)->where('length', $Length)->first();
        $Import = $Amount * $TypeLJoists->price;
        $Clavijas = PriceListScrew::where('description', 'CLAVIJA DE SEGURIDAD PARA VIGAS')->first();
        $CostoClavija = $Clavijas->cost * $Clavijas->f_total;
        $CantidadClavijas = $Amount * 2;
        $CostoTotalClavijas = $CantidadClavijas * $CostoClavija;

        $SJC = SelectiveJoistChair::where('quotation_id', $Quotation_Id)->first();
        if($SJC){
            $SJC->amount = $Amount;
            $SJC->caliber = $Caliber;
            $SJC->skate = $Skate;
            $SJC->loading_capacity = $Weight;
            $SJC->type_joist = $JoistType;
            $SJC->length_meters = $Length;
            $SJC->camber = $TypeLJoists->camber;
            $SJC->weight_kg = $TypeLJoists->weight;
            $SJC->m2 = $TypeLJoists->m2;
            $SJC->length = $TypeLJoists->length;
            $SJC->sku = $TypeLJoists->sku;
            $SJC->unit_price = $TypeLJoists->price;
            $SJC->total_price = $Import + $CostoTotalClavijas;
            $SJC->save();
        }else{
            $SJC = new SelectiveJoistChair();
            $SJC->quotation_id = $Quotation_Id;
            $SJC->amount = $Amount;
            $SJC->caliber = $Caliber;
            $SJC->skate = $Skate;
            $SJC->loading_capacity = $Weight;
            $SJC->type_joist = $JoistType;
            $SJC->length_meters = $Length;
            $SJC->camber = $TypeLJoists->camber;
            $SJC->weight_kg = $TypeLJoists->weight;
            $SJC->m2 = $TypeLJoists->m2;
            $SJC->length = $TypeLJoists->length;
            $SJC->sku = $TypeLJoists->sku;
            $SJC->unit_price = $TypeLJoists->price;
            $SJC->total_price = $Import + $CostoTotalClavijas;
            $SJC->save();
        }

        return view('quotes.selectivo.joists.typechairjoists.store', compact(
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
        $Joists = Joist::where('joist', 'Tipo Silla')->first();
        $Calibers = TypeChairJoistCaliber::where('caliber', '<>', '14')->get();
        $Lengths = TypeChairJoistLength::all();
        $Cambers = TypeChairJoistCamber::all();
        $CrossbarLengths = TypeChairJoistCrossbarLength::all();
        $LoadingCapacities = TypeChairJoistLoadingCapacity::all();
        $TypeLJoists = TypeChairJoist::all();

        return view('quotes.selectivo.joists.typechairjoists.index', compact(
            'Joists',
            'Calibers',
            'Lengths',
            'Cambers',
            'CrossbarLengths',
            'LoadingCapacities',
            'TypeLJoists',
            'Quotation_Id',
            'CantidadClavijas',
            'CostoTotalClavijas',
        ));
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
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SJC')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJB2 = SelectiveJoistCair::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='VIGA TIPO CHAIR'.$SJB2->model;
        $Cart_product->type='SJC';
        $Cart_product->unit_price=$SJB2->unit_price;
        $Cart_product->total_price=$SJB2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJB2->amount;
        $Cart_product->save();
        
        return redirect()->route('menujoists.show',$Quotation_Id);
    
    }
    
}
