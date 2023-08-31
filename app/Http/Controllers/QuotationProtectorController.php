<?php

namespace App\Http\Controllers;

use App\Models\PriceListBar;
use App\Models\PriceListProtector;
use App\Models\Protector;
use App\Models\QuotationProtector;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuotationProtectorController extends Controller
{
    /* Selectivo */
    public function selectivo_protectors_index($id)
    {
        $Quotation_Id = $id;
        $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->get();
        if(count($QuotationProtectors)>0){
            $TotalProtectors = 0;
            foreach($QuotationProtectors as $row){
                $TotalProtectors = ($TotalProtectors + $row->total_price);
            }
            $TotalProtectors = $TotalProtectors;
        }else{
            $TotalProtectors = "";
        }

        return view('quotes.selectivo.protectors.index', compact(
            'Quotation_Id',
            'QuotationProtectors',
            'TotalProtectors'
        ));
    }

    public function selectivo_protectors_create($id)
    {
        $Quotation_Id = $id;
        $Protectors = Protector::all();

        return view('quotes.selectivo.protectors.create', compact(
            'Quotation_Id',
            'Protectors'
        ));
    }

    public function selectivo_protectors_store(Request $request)
    {
        $Quotation_Id = $request->Quotation_Id;
        $Protector = $request->protector;
        $Amount = $request->amount;
        $PostProtectorsCost = PriceListProtector::sum('cost');
        $PostProtectorsSalePrice = PriceListProtector::sum('sale_price');
        $PostProtectorsWeight = PriceListProtector::sum('weight');
        $user_id=Auth::user()->id;
        if($Protector == 'PROTECTOR DE POSTE')
        {
            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $PostProtectorsCost;
                $QuotationProtectors->total_weight = $Amount * $PostProtectorsWeight;
                $QuotationProtectors->unit_price = $PostProtectorsSalePrice;
                $QuotationProtectors->total_price = $Amount * $PostProtectorsSalePrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $PostProtectorsCost;
                $QuotationProtectors->total_weight = $Amount * $PostProtectorsWeight;
                $QuotationProtectors->unit_price = $PostProtectorsSalePrice;
                $QuotationProtectors->total_price = $Amount * $PostProtectorsSalePrice;
                $QuotationProtectors->save();
                
                //(new CartController)->add($user_id,'PROTECTOR DE POSTE',$PostProtectorsSalePrice,$Amount,$Quotation_Id);
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }elseif($Protector == 'PROTECTOR DE BATERIA SENCILLA')
        {
            $PriceListBars = PriceListBar::where('front_development', '1.2000')->first();
            $Cost = $PostProtectorsCost * 2;
            $TotalWeight = $Amount * $PostProtectorsWeight * 2;
            $UnitPrice = ($PostProtectorsSalePrice * 2) + $PriceListBars->sale_price;
            $TotalPrice = $Amount * $UnitPrice;

            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }elseif($Protector == 'PROTECTOR DE BATERIA DOBLE')
        {
            $PriceListBars = PriceListBar::where('front_development', '2.4000')->first();
            $Cost = $PostProtectorsCost * 2;
            $TotalWeight = $Amount * $PostProtectorsWeight * 2;
            $UnitPrice = ($PostProtectorsSalePrice * 2) + $PriceListBars->sale_price;
            $TotalPrice = $Amount * $UnitPrice;

            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }elseif($Protector == 'PROTECTOR DE BATERIA TRIPLE')
        {
            $PriceListBars = PriceListBar::where('front_development', '4.0000')->first();
            $Cost = $PostProtectorsCost * 3;
            $TotalWeight = $Amount * $PostProtectorsWeight * 3;
            $UnitPrice = ($PostProtectorsSalePrice * 3) + $PriceListBars->sale_price;
            $TotalPrice = $Amount * $UnitPrice;

            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }elseif($Protector == 'PROTECTOR DE BATERIA CUADRUPLE')
        {
            $PriceListBars = PriceListBar::where('front_development', '2.4000')->first();
            $Cost = $PostProtectorsCost * 4;
            $TotalWeight = $Amount * $PostProtectorsWeight * 4;
            $UnitPrice = ($PostProtectorsSalePrice * 4) + ($PriceListBars->sale_price * 2);
            $TotalPrice = $Amount * $UnitPrice;

            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }
    }

    public function selectivo_protectors_edit($id)
    {
        $QuotationProtectorId = $id;
        $Protectors = Protector::all();
        $QuotationProtectors = QuotationProtector::find($id);
        $Quotation_Id = $QuotationProtectors->quotation_id;

        return view('quotes.selectivo.protectors.show', compact(
            'QuotationProtectorId',
            'Protectors',
            'QuotationProtectors',
            'Quotation_Id',
        ));
    }

    public function selectivo_protectors_update(Request $request, $id)
    {
        $Quotation_Id = $request->Quotation_Id;
        $Protector = $request->protector;
        $Amount = $request->amount;
        $PostProtectorsCost = PriceListProtector::sum('cost');
        $PostProtectorsSalePrice = PriceListProtector::sum('sale_price');
        $PostProtectorsWeight = PriceListProtector::sum('weight');
        
        if($Protector == 'PROTECTOR DE POSTE')
        {
            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $PostProtectorsCost;
                $QuotationProtectors->total_weight = $Amount * $PostProtectorsWeight;
                $QuotationProtectors->unit_price = $PostProtectorsSalePrice;
                $QuotationProtectors->total_price = $Amount * $PostProtectorsSalePrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $PostProtectorsCost;
                $QuotationProtectors->total_weight = $Amount * $PostProtectorsWeight;
                $QuotationProtectors->unit_price = $PostProtectorsSalePrice;
                $QuotationProtectors->total_price = $Amount * $PostProtectorsSalePrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }elseif($Protector == 'PROTECTOR DE BATERIA SENCILLA')
        {
            $PriceListBars = PriceListBar::where('front_development', '1.2000')->first();
            $Cost = $PostProtectorsCost * 2;
            $TotalWeight = $Amount * $PostProtectorsWeight * 2;
            $UnitPrice = ($PostProtectorsSalePrice * 2) + $PriceListBars->sale_price;
            $TotalPrice = $Amount * $UnitPrice;

            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }elseif($Protector == 'PROTECTOR DE BATERIA DOBLE')
        {
            $PriceListBars = PriceListBar::where('front_development', '2.4000')->first();
            $Cost = $PostProtectorsCost * 2;
            $TotalWeight = $Amount * $PostProtectorsWeight * 2;
            $UnitPrice = ($PostProtectorsSalePrice * 2) + $PriceListBars->sale_price;
            $TotalPrice = $Amount * $UnitPrice;

            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }elseif($Protector == 'PROTECTOR DE BATERIA TRIPLE')
        {
            $PriceListBars = PriceListBar::where('front_development', '4.0000')->first();
            $Cost = $PostProtectorsCost * 3;
            $TotalWeight = $Amount * $PostProtectorsWeight * 3;
            $UnitPrice = ($PostProtectorsSalePrice * 3) + $PriceListBars->sale_price;
            $TotalPrice = $Amount * $UnitPrice;

            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }elseif($Protector == 'PROTECTOR DE BATERIA CUADRUPLE')
        {
            $PriceListBars = PriceListBar::where('front_development', '2.4000')->first();
            $Cost = $PostProtectorsCost * 4;
            $TotalWeight = $Amount * $PostProtectorsWeight * 4;
            $UnitPrice = ($PostProtectorsSalePrice * 4) + ($PriceListBars->sale_price * 2);
            $TotalPrice = $Amount * $UnitPrice;

            $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->where('protector', $Protector)->first();
            if($QuotationProtectors)
            {
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('update_reg', 'ok');
            }else{
                $QuotationProtectors = new QuotationProtector();
                $QuotationProtectors->quotation_id = $Quotation_Id;
                $QuotationProtectors->amount = $Amount;
                $QuotationProtectors->protector = $Protector;
                $QuotationProtectors->cost = $Cost;
                $QuotationProtectors->total_weight = $TotalWeight;
                $QuotationProtectors->unit_price = $UnitPrice;
                $QuotationProtectors->total_price = $TotalPrice;
                $QuotationProtectors->save();
                return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('create_reg', 'ok');
            }
        }
    }

    public function selectivo_protectors_destroy($id)
    {
        
    $Protector=QuotationProtector::find($id);
    $Quotation_Id=$Protector->quotation_id;
    QuotationProtector::destroy($id);
    return redirect()->route('selectivo_protectors.index', $Quotation_Id)->with('eliminar', 'ok');
    }

    /* Double Deep */
    public function double_deep_protectors_index($id)
    {

    }

    public function double_deep_protectors_create($id)
    {

    }

    public function double_deep_protectors_store(Request $request)
    {

    }

    /* Resources */
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
}
