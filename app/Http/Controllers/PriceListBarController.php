<?php

namespace App\Http\Controllers;

use App\Models\PriceListBar;
use App\Models\Steel;
use Illuminate\Http\Request;

class PriceListBarController extends Controller
{
    public function index()
    {
        $PriceListBars = PriceListBar::all();
        return view('admin.price_list_bars.index', compact('PriceListBars'));
    }

    public function create()
    {
        return view('admin.price_list_bars.create');
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

            $PriceListBars = new PriceListBar();
            $PriceListBars->background_development = $request->background_development;
            $PriceListBars->front_development = $request->front_development;
            $PriceListBars->piece = $request->piece;
            $PriceListBars->amount = $request->amount;
            $PriceListBars->sku = $request->sku;
            $PriceListBars->caliber = $request->caliber;
            $PriceListBars->type = $Type;
            $PriceListBars->kg_m2 = $request->kg_m2;
            $PriceListBars->weight = $Weight;
            $PriceListBars->m2 = $M2;
            $PriceListBars->f_vta = $request->f_vta;
            $PriceListBars->f_desp = $request->f_desp;
            $PriceListBars->f_emb = $request->f_emb;
            $PriceListBars->f_desc = $request->f_desc;
            $PriceListBars->f_total = $F_Total;
            $PriceListBars->cost = $Cost;
            $PriceListBars->sale_price = $SalePrice;
            $PriceListBars->save();

            return redirect()->route('price_list_bars.index')->with('create_reg', 'ok');
        }else{
            return redirect()->route('price_list_bars.create')->with('no_existe_acero', 'ok');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $PriceListBars = PriceListBar::find($id);
        return view('admin.price_list_bars.show', compact(
            'PriceListBars',
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

            $PriceListBars = PriceListBar::find($id);
            $PriceListBars->background_development = $request->background_development;
            $PriceListBars->front_development = $request->front_development;
            $PriceListBars->piece = $request->piece;
            $PriceListBars->amount = $request->amount;
            $PriceListBars->sku = $request->sku;
            $PriceListBars->caliber = $request->caliber;
            $PriceListBars->type = $Type;
            $PriceListBars->kg_m2 = $request->kg_m2;
            $PriceListBars->weight = $Weight;
            $PriceListBars->m2 = $M2;
            $PriceListBars->f_vta = $request->f_vta;
            $PriceListBars->f_desp = $request->f_desp;
            $PriceListBars->f_emb = $request->f_emb;
            $PriceListBars->f_desc = $request->f_desc;
            $PriceListBars->f_total = $F_Total;
            $PriceListBars->cost = $Cost;
            $PriceListBars->sale_price = $SalePrice;
            $PriceListBars->save();

            return redirect()->route('price_list_bars.index')->with('update_reg', 'ok');
        }else{
            return redirect()->route('price_list_bars.edit', $id)->with('no_existe_acero', 'ok');
        }        
    }

    public function destroy($id)
    {
        PriceListBar::destroy($id);

        return redirect()->route('price_list_bars.index')->with('eliminar', 'ok');
    }
}
