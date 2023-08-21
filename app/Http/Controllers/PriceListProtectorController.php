<?php

namespace App\Http\Controllers;

use App\Models\PriceListProtector;
use App\Models\Steel;
use Illuminate\Http\Request;

class PriceListProtectorController extends Controller
{
    public function index()
    {
        $PriceListProtectors = PriceListProtector::all();
        return view('admin.price_list_protectors.index', compact('PriceListProtectors'));
    }

    public function create()
    {
        return view('admin.price_list_protectors.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'background_development' => 'required',
            'front_development' => 'required',
            'piece' => 'required',
            'amount' => 'required',
            'sku' => 'required',
            'caliber' => 'required',
            'kg_m2' => 'required',
            'f_vta' => 'required',
            'f_desp' => 'required',
            'f_emb' => 'required',
            'f_desc' => 'required',
        ];

        $messages = [
            'background_development.required' => 'Caputure la información requerida',
            'front_development.required' => 'Caputure la información requerida',
            'piece.required' => 'Caputure la información requerida',
            'amount.required' => 'Caputure la información requerida',
            'sku.required' => 'Caputure la información requerida',
            'caliber.required' => 'Caputure la información requerida',
            'kg_m2.required' => 'Caputure la información requerida',
            'f_vta.required' => 'Caputure la información requerida',
            'f_desp.required' => 'Caputure la información requerida',
            'f_emb.required' => 'Caputure la información requerida',
            'f_desc.required' => 'Caputure la información requerida',
        ];

        $request->validate($rules, $messages);

        $Steels = Steel::where('caliber', $request->caliber)->where('type', 'Negra')->first();

        if($Steels){
            $SteelCost = $Steels->cost;
            $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;
            $Type = 'Negra';
            $Weight = $request->background_development * $request->front_development * $request->kg_m2;
            $M2 = $request->background_development * $request->front_development * $request->amount * 2;
            $Cost = $Weight * $SteelCost;
            $SalePrice = $Cost * $F_Total;

            $PriceListProtectors = new PriceListProtector();
            $PriceListProtectors->background_development = $request->background_development;
            $PriceListProtectors->front_development = $request->front_development;
            $PriceListProtectors->piece = $request->piece;
            $PriceListProtectors->amount = $request->amount;
            $PriceListProtectors->sku = $request->sku;
            $PriceListProtectors->caliber = $request->caliber;
            $PriceListProtectors->type = $Type;
            $PriceListProtectors->kg_m2 = $request->kg_m2;
            $PriceListProtectors->weight = $Weight;
            $PriceListProtectors->m2 = $M2;
            $PriceListProtectors->f_vta = $request->f_vta;
            $PriceListProtectors->f_desp = $request->f_desp;
            $PriceListProtectors->f_emb = $request->f_emb;
            $PriceListProtectors->f_desc = $request->f_desc;
            $PriceListProtectors->f_total = $F_Total;
            $PriceListProtectors->cost = $Cost;
            $PriceListProtectors->sale_price = $SalePrice;
            $PriceListProtectors->save();

            return redirect()->route('price_list_protectors.index')->with('create_reg', 'ok');
        }else{
            return redirect()->route('price_list_protectors.create')->with('no_existe_acero', 'ok');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $PriceListProtectors = PriceListProtector::find($id);
        return view('admin.price_list_protectors.show', compact(
            'PriceListProtectors',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'background_development' => 'required',
            'front_development' => 'required',
            'piece' => 'required',
            'amount' => 'required',
            'sku' => 'required',
            'caliber' => 'required',
            'kg_m2' => 'required',
            'f_vta' => 'required',
            'f_desp' => 'required',
            'f_emb' => 'required',
            'f_desc' => 'required',
        ];

        $messages = [
            'background_development.required' => 'Caputure la información requerida',
            'front_development.required' => 'Caputure la información requerida',
            'piece.required' => 'Caputure la información requerida',
            'amount.required' => 'Caputure la información requerida',
            'sku.required' => 'Caputure la información requerida',
            'caliber.required' => 'Caputure la información requerida',
            'kg_m2.required' => 'Caputure la información requerida',
            'f_vta.required' => 'Caputure la información requerida',
            'f_desp.required' => 'Caputure la información requerida',
            'f_emb.required' => 'Caputure la información requerida',
            'f_desc.required' => 'Caputure la información requerida',
        ];

        $request->validate($rules, $messages);

        $Steels = Steel::where('caliber', $request->caliber)->where('type', $request->type)->first();

        if($Steels){
            $SteelCost = $Steels->cost;
            $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;
            $Type = 'Negra';
            $Weight = $request->background_development * $request->front_development * $request->kg_m2;
            $M2 = $request->background_development * $request->front_development * $request->amount * 2;
            $Cost = $Weight * $SteelCost;
            $SalePrice = $Cost * $F_Total;

            $PriceListProtectors = PriceListProtector::find($id);
            $PriceListProtectors->background_development = $request->background_development;
            $PriceListProtectors->front_development = $request->front_development;
            $PriceListProtectors->piece = $request->piece;
            $PriceListProtectors->amount = $request->amount;
            $PriceListProtectors->sku = $request->sku;
            $PriceListProtectors->caliber = $request->caliber;
            $PriceListProtectors->type = $Type;
            $PriceListProtectors->kg_m2 = $request->kg_m2;
            $PriceListProtectors->weight = $Weight;
            $PriceListProtectors->m2 = $M2;
            $PriceListProtectors->f_vta = $request->f_vta;
            $PriceListProtectors->f_desp = $request->f_desp;
            $PriceListProtectors->f_emb = $request->f_emb;
            $PriceListProtectors->f_desc = $request->f_desc;
            $PriceListProtectors->f_total = $F_Total;
            $PriceListProtectors->cost = $Cost;
            $PriceListProtectors->sale_price = $SalePrice;
            $PriceListProtectors->save();

            return redirect()->route('price_list_protectors.index')->with('update_reg', 'ok');
        }else{
            return redirect()->route('price_list_protectors.edit', $id)->with('no_existe_acero', 'ok');
        }        
    }

    public function destroy($id)
    {
        PriceListProtector::destroy($id);

        return redirect()->route('price_list_protectors.index')->with('eliminar', 'ok');
    }
}