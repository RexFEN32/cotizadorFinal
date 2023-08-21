<?php

namespace App\Http\Controllers;

use App\Models\DoubleDeepJoistC2;
use App\Models\Joist;
use App\Models\TypeC2Joist;
use App\Models\TypeC2JoistCaliber;
use App\Models\TypeC2JoistCamber;
use App\Models\TypeC2JoistCrossbarLength;
use App\Models\TypeC2JoistLength;
use App\Models\TypeC2JoistLoadingCapacity;
use Illuminate\Http\Request;

class DoubleDeepTypeC2JoistController extends Controller
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
        
        $TypeLJoists = TypeC2Joist::where('caliber',$Caliber)->where('camber', $Camber)->where('length', $Length)->first();
        $Import = $Amount * $TypeLJoists->price;

        $SJC2 = DoubleDeepJoistC2::where('quotation_id', $Quotation_Id)->first();
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
            $SJC2->total_price = $Import;
            $SJC2->save();
        }else{
            $SJC2 = new DoubleDeepJoistC2();
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
            $SJC2->total_price = $Import;
            $SJC2->save();
        }
        return view('quotes.double_deep.joists.typec2joists.store', compact(
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
        $Joists = Joist::where('joist', 'Tipo C2')->first();
        $Calibers = TypeC2JoistCaliber::where('caliber', '<>', '14')->get();
        $Lengths = TypeC2JoistLength::all();
        $Cambers = TypeC2JoistCamber::all();
        $CrossbarLengths = TypeC2JoistCrossbarLength::all();
        $LoadingCapacities = TypeC2JoistLoadingCapacity::all();
        $TypeLJoists = TypeC2Joist::all();

        return view('quotes.double_deep.joists.typec2joists.index', compact(
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
