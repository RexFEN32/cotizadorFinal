<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use App\Models\Steel;
use App\Models\Destination;
use App\Models\Transport;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function index()
    {
        $PriceLists = PriceList::all();
        return view('admin.price_lists.index', compact('PriceLists'));
    }

    public function create()
    {
        return view('admin.price_lists.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'description' => 'required',
            'caliber' => 'required',
            'type' => 'required',
            'system' => 'required',
            'piece' => 'required',
            'f_vta' => 'required',
            'f_desp' => 'required',
            'f_emb' => 'required',
            'f_desc' => 'required',
        ];

        $messages = [
            'description.required' => 'Escriba la descripción',
            'caliber.required' => 'Escriba el calibre',
            'type.required' => 'Capture el tipo',
            'system.required' => 'Capture el sistema',
            'piece.required' => 'Capture la pieza',
            'f_vta.required' => 'Escriba el Factor de Venta',
            'f_desp.required' => 'Escriba el Factor de Despiste',
            'f_emb.required' => 'Escriba el Factor de Embarque',
            'f_desc.required' => 'Escriba el Factor de Descuento',
        ];

        $request->validate($rules, $messages);

        $Steels = Steel::where('caliber', $request->caliber)->where('type', $request->type)->first();

        if($Steels){
            $Cost = $Steels->cost;
            $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;

            $PriceLists = new PriceList();
            $PriceLists->description = $request->description;
            $PriceLists->caliber = $request->caliber;
            $PriceLists->type = $request->type;
            $PriceLists->system = $request->system;
            $PriceLists->piece = $request->piece;
            $PriceLists->cost = $Cost;
            $PriceLists->f_vta = $request->f_vta;
            $PriceLists->f_desp = $request->f_desp;
            $PriceLists->f_emb = $request->f_emb;
            $PriceLists->f_desc = $request->f_desc;
            $PriceLists->f_total = $F_Total;
            $PriceLists->save();

            return redirect()->route('price_lists.index')->with('create_reg', 'ok');
        }else{
            return redirect()->route('price_lists.create')->with('no_existe_acero', 'ok');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $PriceLists = PriceList::find($id);
        return view('admin.price_lists.show', compact(
            'PriceLists',
        ));
    }

    public function update(Request $request, $id)
    {

        $PriceLists = PriceList::find($id);
        //caso especial, si se editan destinos
        if($PriceLists->system=='DESTINO'){
            $rules = [
                'description' => 'required',
                'cost' => 'required',
                'f_vta' => 'required',
                'f_desp' => 'required',
                'f_emb' => 'required',
                'f_desc' => 'required',
            ];
    
            $messages = [
                'description.required' => 'Escriba la descripción',
                'cost.required' => 'Capture El costo',
                'f_vta.required' => 'Escriba el Factor de Venta',
                'f_desp.required' => 'Escriba el Factor de Despiste',
                'f_emb.required' => 'Escriba el Factor de Embarque',
                'f_desc.required' => 'Escriba el Factor de Descuento',
            ];
            $request->validate($rules, $messages);
            $PriceLists->cost=$request->cost;
            $PriceLists->save();
            $Destinos=Destination::where('state',$PriceLists->caliber)->where('unit',$PriceLists->piece)->get();
            foreach($Destinos as $d){
             $d->cost=$request->cost;
             $d->save();
            }
            return redirect()->route('price_lists.index')->with('update_reg', 'ok');
            



        }else{
            $rules = [
                'description' => 'required',
                'caliber' => 'required',
                'type' => 'required',
                'system' => 'required',
                'piece' => 'required',
                'f_vta' => 'required',
                'f_desp' => 'required',
                'f_emb' => 'required',
                'f_desc' => 'required',
            ];
    
            $messages = [
                'description.required' => 'Escriba la descripción',
                'caliber.required' => 'Escriba el calibre',
                'type.required' => 'Capture el tipo',
                'system.required' => 'Capture el sistema',
                'piece.required' => 'Capture la pieza',
                'f_vta.required' => 'Escriba el Factor de Venta',
                'f_desp.required' => 'Escriba el Factor de Despiste',
                'f_emb.required' => 'Escriba el Factor de Embarque',
                'f_desc.required' => 'Escriba el Factor de Descuento',
            ];
    
            $request->validate($rules, $messages);
    
            $Steels = Steel::where('caliber', $request->caliber)->where('type', $request->type)->first();
             
            if($Steels){
                $Cost = $Steels->cost;
                $F_Total = ($request->f_vta * $request->f_desp * $request->f_emb) / $request->f_desc;
    
                $PriceLists = PriceList::find($id);
                $PriceLists->description = $request->description;
                $PriceLists->caliber = $request->caliber;
                $PriceLists->type = $request->type;
                $PriceLists->system = $request->system;
                $PriceLists->piece = $request->piece;
                $PriceLists->cost = $Cost;
                $PriceLists->f_vta = $request->f_vta;
                $PriceLists->f_desp = $request->f_desp;
                $PriceLists->f_emb = $request->f_emb;
                $PriceLists->f_desc = $request->f_desc;
                $PriceLists->f_total = $F_Total;
                $PriceLists->save();
    
                return redirect()->route('price_lists.index')->with('update_reg', 'ok');
            }else{
                return redirect()->route('price_lists.edit', $id)->with('no_existe_acero', 'ok');
            }
        }
                
    }

    public function destroy($id)
    {
        PriceList::destroy($id);

        return redirect()->route('price_lists.index')->with('eliminar', 'ok');
    }
}
