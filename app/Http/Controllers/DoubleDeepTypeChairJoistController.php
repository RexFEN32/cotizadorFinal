<?php

namespace App\Http\Controllers;

use App\Models\DoubleDeepJoistChair;
use App\Models\Joist;
use App\Models\TypeChairJoist;
use App\Models\TypeChairJoistCaliber;
use App\Models\TypeChairJoistCamber;
use App\Models\TypeChairJoistCrossbarLength;
use App\Models\TypeChairJoistLength;
use App\Models\TypeChairJoistLoadingCapacity;
use Illuminate\Http\Request;

class DoubleDeepTypeChairJoistController extends Controller
{
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

        $SJC = DoubleDeepJoistChair::where('quotation_id', $Quotation_Id)->first();
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
            $SJC->total_price = $Import;
            $SJC->save();
        }else{
            $SJC = new DoubleDeepJoistChair();
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
            $SJC->total_price = $Import;
            $SJC->save();
        }

        return view('quotes.double_deep.joists.typechairjoists.store', compact(
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
            'Quotation_Id'
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

        return view('quotes.double_deep.joists.typechairjoists.index', compact(
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
}
