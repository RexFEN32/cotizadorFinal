<?php

namespace App\Http\Controllers;

use App\Models\Joist;
use App\Models\PriceListScrew;
use App\Models\SelectiveJoistC2;
use App\Models\TypeC2Joist;
use App\Models\TypeC2JoistCaliber;
use App\Models\TypeC2JoistCamber;
use App\Models\TypeC2JoistCrossbarLength;
use App\Models\TypeC2JoistLength;
use App\Models\TypeC2JoistLoadingCapacity;
use Illuminate\Http\Request;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;

class TypeC2JoistController extends Controller
{
    // public function caliber14_show($id)
    // {
    //     $Quotation_Id = $id;
    //     $Joists = Joist::where('joist', 'Tipo C2')->first();
    //     $Calibers = TypeC2JoistCaliber::where('caliber', '14')->get();
    //     $Lengths = TypeC2JoistLength::all();
    //     $Cambers = TypeC2JoistCamber::all();
    //     $CrossbarLengths = TypeC2JoistCrossbarLength::all();
    //     $LoadingCapacities = TypeC2JoistLoadingCapacity::all();
    //     $TypeLJoists = TypeC2Joist::where('caliber', '14')->get();

    //     return view('quotes.selectivo.joists.typec2joists.caliber14.index', compact(
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
    //     $Cambers = TypeC2JoistLoadingCapacity::where('crossbar_length', '>=', $Length)->where('loading_capacity', '>=', $WeightIncrement)->first();
    //     if($Cambers){
    //         $TypeLJoists = TypeC2Joist::where('caliber','14')->where('camber', $Cambers->camber)->where('length', $Length)->first();
    //         $Import = $request->amount * $TypeLJoists->price;

    //         return view('quotes.selectivo.joists.typec2joists.caliber14.store', compact(
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
        
        $TypeLJoists = TypeC2Joist::where('caliber',$Caliber)->where('camber', $Camber)->where('length', $Length)->first();
        $Import = $Amount * $TypeLJoists->price;
        $Clavijas = PriceListScrew::where('description', 'CLAVIJA DE SEGURIDAD PARA VIGAS')->first();
        $CostoClavija = $Clavijas->cost * $Clavijas->f_total;
        $CantidadClavijas = $Amount * 2;
        $CostoTotalClavijas = $CantidadClavijas * $CostoClavija;

        $SJC2 = SelectiveJoistC2::where('quotation_id', $Quotation_Id)->first();
        if($SJC2){
            $SJC2->amount = $Amount;
            $SJC2->caliber = $Caliber;
            $SJC2->skate = $Skate;
            $SJC2->loading_capacity = $Weight;
            $SJC2->type_joist = $JoistType;
            $SJC2->length_meters = $Length;
            $SJC2->camber = $TypeLJoists->camber;
            $SJC2->weight_kg = $TypeLJoists->weight;
            $SJC2->m2 = $TypeLJoists->m2;
            $SJC2->length = $TypeLJoists->length;
            $SJC2->sku = $TypeLJoists->sku;
            $SJC2->unit_price = $TypeLJoists->price;
            $SJC2->total_price = $Import + $CostoTotalClavijas;
            $SJC2->save();
        }else{
            $SJC2 = new SelectiveJoistC2();
            $SJC2->quotation_id = $Quotation_Id;
            $SJC2->amount = $Amount;
            $SJC2->caliber = $Caliber;
            $SJC2->skate = $Skate;
            $SJC2->loading_capacity = $Weight;
            $SJC2->type_joist = $JoistType;
            $SJC2->length_meters = $Length;
            $SJC2->camber = $TypeLJoists->camber;
            $SJC2->weight_kg = $TypeLJoists->weight;
            $SJC2->m2 = $TypeLJoists->m2;
            $SJC2->length = $TypeLJoists->length;
            $SJC2->sku = $TypeLJoists->sku;
            $SJC2->unit_price = $TypeLJoists->price;
            $SJC2->total_price = $Import + $CostoTotalClavijas;
            $SJC2->save();
        }
        return view('quotes.selectivo.joists.typec2joists.store', compact(
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
        $Joists = Joist::where('joist', 'Tipo C2')->first();
        $Calibers = TypeC2JoistCaliber::where('caliber', '<>', '14')->get();
        $Lengths = TypeC2JoistLength::all();
        $Cambers = TypeC2JoistCamber::all();
        $CrossbarLengths = TypeC2JoistCrossbarLength::all();
        $LoadingCapacities = TypeC2JoistLoadingCapacity::all();
        $TypeLJoists = TypeC2Joist::all();

        return view('quotes.selectivo.joists.typec2joists.index', compact(
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
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SJC2')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJB2 = SelectiveJoistC2::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='VIGA TIPO C 2'.$SJB2->model;
        $Cart_product->type='SJC2';
        $Cart_product->unit_price=$SJB2->unit_price;
        $Cart_product->total_price=$SJB2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJB2->amount;
        $Cart_product->save();
        
        return redirect()->route('menujoists.show',$Quotation_Id);
    
    }
    
}
