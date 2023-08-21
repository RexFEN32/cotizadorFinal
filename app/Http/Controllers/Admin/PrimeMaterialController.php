<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frame;
use App\Models\PriceFrame;
use App\Models\PrimeMaterial;
use Illuminate\Http\Request;

class PrimeMaterialController extends Controller
{
    
    public function index()
    {
        $Productos = PrimeMaterial::all();

        return view('admin.prime_materials.index', compact('Productos'));

    }

    public function create()
    {
        return view('admin.prime_materials.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'sku' => 'required',
            'product' => 'required',
            'cost' => 'required',
        ];

        $messages = [
            'sku.required' => 'Capture el Stock Keeping Unit del Producto',
            'product.required' => 'Capture el nombre del Producto, Materia Prima o Factor',
            'cost.required' => 'Capture el Costo del Producto',
        ];

        $request->validate($rules, $messages);

        $PrimeMaterials = new PrimeMaterial();
        $PrimeMaterials->sku = $request->sku;
        $PrimeMaterials->product = $request->product;
        $PrimeMaterials->especifications = $request->especifications;
        $PrimeMaterials->measurement_unit = $request->measurement_unit;
        $PrimeMaterials->description = $request->description;
        $PrimeMaterials->cost = $request->cost;
        $PrimeMaterials->status = 'A';
        $PrimeMaterials->save();

        return redirect()->route('prime_materials.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function showtables()
    {
        return view('admin.prime_materials.showtables');
    }

    public function tables_update(Request $request)
    {
        $var = $request->var;

        if($var == 'cal12'){
            $LaminaC12 = PrimeMaterial::where('product', 'LAMINA CALIBRE 12')->first();
            $Solera = PrimeMaterial::where('product', 'SOLERA DE 1/4" X 4"')->first();
            $Factor = PrimeMaterial::where('product', 'FACTOR DE ACERO')->first();

            if(!$LaminaC12){
                return redirect()->route('prime_materials.showtables')->with('no_existe', 'ok');
            }elseif(!$Solera){
                return redirect()->route('prime_materials.showtables')->with('no_existe', 'ok');
            }elseif(!$Factor){
                return redirect()->route('prime_materials.showtables')->with('no_existe', 'ok');
            }

            $Costo_Lamina_C12 = $LaminaC12->cost;
            $Costo_Solera = $Solera->cost;
            $Costo_Factor = $Factor->cost;

            $Marcos12 = PriceFrame::orderBy('id', 'ASC')->where('caliber', '12')->get();

            foreach($Marcos12 as $row){
                $id = $row->id;
                $steel_weight_kg = $row->steel_weight_kg;
                $solera_weight_kg = $row->solera_weight_kg;
                $price = number_format((($Costo_Lamina_C12 * $steel_weight_kg) + ($Costo_Solera * $solera_weight_kg)) * $Costo_Factor,2);
                $price = floatval(preg_replace('/[^\d.]/', '', $price));

                $Price = PriceFrame::find($id);
                $Price->price = $price;
                $Price->save();
            }

            return redirect()->route('prime_materials.showtables')->with('update_reg', 'ok');

        }elseif($var == 'cal14')
        {
            $LaminaC14 = PrimeMaterial::where('product', 'LAMINA CALIBRE 14')->first();
            $Solera = PrimeMaterial::where('product', 'SOLERA DE 1/4" X 4"')->first();
            $Factor = PrimeMaterial::where('product', 'FACTOR DE ACERO')->first();

            if(!$LaminaC14){
                return redirect()->route('prime_materials.showtables')->with('no_existe', 'ok');
            }elseif(!$Solera){
                return redirect()->route('prime_materials.showtables')->with('no_existe', 'ok');
            }elseif(!$Factor){
                return redirect()->route('prime_materials.showtables')->with('no_existe', 'ok');
            }

            $Costo_Lamina_C14 = $LaminaC14->cost;
            $Costo_Solera = $Solera->cost;
            $Costo_Factor = $Factor->cost;

            $Marcos14 = PriceFrame::orderBy('id', 'ASC')->where('caliber', '14')->get();

            foreach($Marcos14 as $row){
                $id = $row->id;
                $steel_weight_kg = $row->steel_weight_kg;
                $solera_weight_kg = $row->solera_weight_kg;
                $price = (($Costo_Lamina_C14 * $steel_weight_kg) + ($Costo_Solera * $solera_weight_kg)) * $Costo_Factor;
                $price = floatval(preg_replace('/[^\d.]/', '', $price));


                $Price = PriceFrame::find($id);
                $Price->price = $price;
                $Price->save();
            }

            return redirect()->route('prime_materials.showtables')->with('update_reg', 'ok');
            
        }else{
            return view('admin.prime_materials.showtables');
        }
    
    }

    public function edit($id)
    {
        $Prime_Material = PrimeMaterial::find($id);

        return view('admin.prime_materials.show', compact(
            'Prime_Material',
        ));
    }
     
    public function update(Request $request, $id)
    {
        $rules = [
            'sku' => 'required',
            'product' => 'required',
            'cost' => 'required',
        ];

        $messages = [
            'sku.required' => 'Capture el Stock Keeping Unit del Producto',
            'product.required' => 'Capture el nombre del Producto, Materia Prima o Factor',
            'cost.required' => 'Capture el Costo del Producto',
        ];

        $request->validate($rules, $messages);

        $PrimeMaterials = PrimeMaterial::find($id);
        $PrimeMaterials->sku = $request->sku;
        $PrimeMaterials->product = $request->product;
        $PrimeMaterials->especifications = $request->especifications;
        $PrimeMaterials->measurement_unit = $request->measurement_unit;
        $PrimeMaterials->description = $request->description;
        $PrimeMaterials->cost = $request->cost;
        $PrimeMaterials->status = 'A';
        $PrimeMaterials->save();

        return redirect()->route('prime_materials.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        PrimeMaterial::destroy($id);

        return redirect()->route('prime_materials.index')->with('eliminar', 'ok');
    }
}
