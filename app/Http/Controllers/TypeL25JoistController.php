<?php

namespace App\Http\Controllers;

use App\Models\Joist;
use App\Models\PriceListScrew;
use App\Models\SelectiveJoistL25;
use App\Models\SelectiveJoistL25Caliber14;
use App\Models\TypeL25Joist;
use App\Models\TypeL25JoistCaliber;
use App\Models\TypeL25JoistCamber;
use App\Models\TypeL25JoistCrossbarLength;
use App\Models\TypeL25JoistLength;
use App\Models\TypeL25JoistLoadingCapacity;
use Illuminate\Http\Request;

class TypeL25JoistController extends Controller
{
    public function caliber14_show($id)
    {
        $Quotation_Id = $id;
        $Joists = Joist::where('joist', 'Tipo L 2.5')->first();
        $Calibers = TypeL25JoistCaliber::where('caliber', '14')->get();
        $Lengths = TypeL25JoistLength::all();
        $Cambers = TypeL25JoistCamber::all();
        $CrossbarLengths = TypeL25JoistCrossbarLength::all();
        $LoadingCapacities = TypeL25JoistLoadingCapacity::all();
        $TypeLJoists = TypeL25Joist::where('caliber', '14')->get();


        return view('quotes.selectivo.joists.typel25joists.caliber14.index', compact(
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
        $Cambers = TypeL25JoistLoadingCapacity::where('crossbar_length', '>=', $Length)->where('loading_capacity', '>=', $WeightIncrement)->first();
        if($Cambers){
            $TypeLJoists = TypeL25Joist::where('caliber','14')->where('camber', $Cambers->camber)->where('length', $Length)->first();
            $Import = $request->amount * $TypeLJoists->price;
            $Clavijas = PriceListScrew::where('description', 'CLAVIJA DE SEGURIDAD PARA VIGAS')->first();
            $CostoClavija = $Clavijas->cost * $Clavijas->f_total;
            $CantidadClavijas = $Amount * 2;
            $CostoTotalClavijas = $CantidadClavijas * $CostoClavija;

            $SJL25C14 = SelectiveJoistL25Caliber14::where('quotation_id', $Quotation_Id)->first();
            if($SJL25C14){
                $SJL25C14->amount = $Amount;
                $SJL25C14->caliber = $Caliber;
                $SJL25C14->loading_capacity = $Weight;
                $SJL25C14->type_joist = $JoistType;
                $SJL25C14->length_meters = $Length;
                $SJL25C14->camber = $TypeLJoists->camber;
                $SJL25C14->weight_kg = $TypeLJoists->weight;
                $SJL25C14->m2 = $TypeLJoists->m2;
                $SJL25C14->length = $TypeLJoists->length;
                $SJL25C14->sku = $TypeLJoists->sku;
                $SJL25C14->unit_price = $TypeLJoists->price;
                $SJL25C14->total_price = $Import + $CostoTotalClavijas;
                $SJL25C14->save();
            }else{
                $SJL25C14 = new SelectiveJoistL25Caliber14();
                $SJL25C14->quotation_id = $Quotation_Id;
                $SJL25C14->amount = $Amount;
                $SJL25C14->caliber = $Caliber;
                $SJL25C14->loading_capacity = $Weight;
                $SJL25C14->type_joist = $JoistType;
                $SJL25C14->length_meters = $Length;
                $SJL25C14->camber = $TypeLJoists->camber;
                $SJL25C14->weight_kg = $TypeLJoists->weight;
                $SJL25C14->m2 = $TypeLJoists->m2;
                $SJL25C14->length = $TypeLJoists->length;
                $SJL25C14->sku = $TypeLJoists->sku;
                $SJL25C14->unit_price = $TypeLJoists->price;
                $SJL25C14->total_price = $Import + $CostoTotalClavijas;
                $SJL25C14->save();
            }

            return view('quotes.selectivo.joists.typel25joists.caliber14.store', compact(
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
        
        $TypeLJoists = TypeL25Joist::where('caliber',$Caliber)->where('camber', $Camber)->where('length', $Length)->first();
        $Import = $Amount * $TypeLJoists->price;
        $Clavijas = PriceListScrew::where('description', 'CLAVIJA DE SEGURIDAD PARA VIGAS')->first();
        $CostoClavija = $Clavijas->cost * $Clavijas->f_total;
        $CantidadClavijas = $Amount * 2;
        $CostoTotalClavijas = $CantidadClavijas * $CostoClavija;

        $SJL25 = SelectiveJoistL25::where('quotation_id', $Quotation_Id)->first();
        if($SJL25){
            $SJL25->amount = $Amount;
            $SJL25->caliber = $Caliber;
            $SJL25->skate = $Skate;
            $SJL25->loading_capacity = $Weight;
            $SJL25->type_joist = $JoistType;
            $SJL25->length_meters = $Length;
            $SJL25->camber = $TypeLJoists->camber;
            $SJL25->weight_kg = $TypeLJoists->weight;
            $SJL25->m2 = $TypeLJoists->m2;
            $SJL25->length = $TypeLJoists->length;
            $SJL25->sku = $TypeLJoists->sku;
            $SJL25->unit_price = $TypeLJoists->price;
            $SJL25->total_price = $Import + $CostoTotalClavijas;
            $SJL25->save();
        }else{
            $SJL25 = new SelectiveJoistL25();
            $SJL25->quotation_id = $Quotation_Id;
            $SJL25->amount = $Amount;
            $SJL25->caliber = $Caliber;
            $SJL25->skate = $Skate;
            $SJL25->loading_capacity = $Weight;
            $SJL25->type_joist = $JoistType;
            $SJL25->length_meters = $Length;
            $SJL25->camber = $TypeLJoists->camber;
            $SJL25->weight_kg = $TypeLJoists->weight;
            $SJL25->m2 = $TypeLJoists->m2;
            $SJL25->length = $TypeLJoists->length;
            $SJL25->sku = $TypeLJoists->sku;
            $SJL25->unit_price = $TypeLJoists->price;
            $SJL25->total_price = $Import + $CostoTotalClavijas;
            $SJL25->save();
        }

        return view('quotes.selectivo.joists.typel25joists.store', compact(
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
        $Joists = Joist::where('joist', 'Tipo L 2.5')->first();
        $Calibers = TypeL25JoistCaliber::where('caliber', '<>', '14')->get();
        $Lengths = TypeL25JoistLength::all();
        $Cambers = TypeL25JoistCamber::all();
        $CrossbarLengths = TypeL25JoistCrossbarLength::all();
        $LoadingCapacities = TypeL25JoistLoadingCapacity::all();
        $TypeLJoists = TypeL25Joist::all();

        return view('quotes.selectivo.joists.typel25joists.index', compact(
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
}
