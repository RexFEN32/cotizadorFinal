<?php

namespace App\Http\Controllers;

use App\Models\BucklingMini;
use App\Models\MiniatureFrame;
use App\Models\DepthMini;
use App\Models\HeightMini;
use App\Models\PriceList;
use App\Models\PriceListScrew;
use App\Models\PriceMiniatureFrame;
use App\Models\SelectiveMiniatureFrame;
use Illuminate\Http\Request;

class MiniatureFrameController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;

        $depth_mini = DepthMini::all();
        $buckling_mini = BucklingMini::all();
        $height_mini = HeightMini::all();

        return view('quotes.selectivo.frames.miniatureframes.index', compact(
            'depth_mini',
            'buckling_mini',
            'height_mini',
            'Quotation_Id'
        ));
    }
    
    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'weight' => 'required',
            'caliber' => 'required',
            'buckling_mini' => 'required',
            'depth_mini' => 'required',
            'height_mini' => 'required',
        ];

        $messages = [
            'amount.required' => 'Favor de capturar el número de marcos a cotizar',
            'weight.required' => 'Favor de capturar el Peso',
        ];

        $request->validate($rules, $messages);

        $Quotation_Id = $request->Quotation_Id;
        $Cantidad = $request->amount;
        $Calibre = $request->caliber;
        $Pandeo = $request->buckling_mini;
        $Peso = $request->weight;
        $PesoA = ($Peso * 0.1) + $Peso;

        $Models = MiniatureFrame::where('caliber', $Calibre)->where('buckling', $Pandeo)->where('weight', '>=', $PesoA)->first();
        if($Models){
            $Modelo = $Models->model;
            $Profundidad = $request->depth_mini;
            $Altura = $request->height_mini;

            $Data = PriceMiniatureFrame::where('caliber', $Calibre)->where('model', $Modelo)->where('depth', $Profundidad)->where('height', $Altura)->first();
            if($Data){
                $Total_Peso = $Cantidad * $Peso;
                $Total_Postes = $Cantidad * $Data->poles;
                $Total_Travesanos = $Cantidad * $Data->crossbars;
                $Total_Diagonales = $Cantidad * $Data->diagonals;
                $Total_Placas = $Cantidad * $Data->plates;
                $Precio_Total = $Cantidad * $Data->price;
                $Total_Acero_Kg = $Cantidad * $Data->steel_weight_kg;
                $Total_Solera_Kg = $Cantidad * $Data->solera_weight_kg;
                $Total_Kg = $Cantidad * $Data->total_kg;
                $Total_m2 = $Cantidad * $Data->total_m2;
                $Sku = $Data->sku;
                $Calzas = 4;
                $CostoCalzas = PriceList::where('piece', 'CALZAS')->first();
                $CostoCalza = $CostoCalzas->cost * $CostoCalzas->f_total;
                $Taquetes = 4;
                $CostoTaquetes = PriceListScrew::where('description', 'TAQUETE')->first();
                $CostoTaquete = $CostoTaquetes->cost * $CostoTaquetes->f_total;
                $CostoTotalCalza = ($CostoCalza * 4) * $Cantidad;
                $CostoTotalTaquete = ($CostoTaquete * 4) * $Cantidad;
                $TotalCalzas = $Cantidad * 4;
                $TotalTaquetes = $Cantidad * 4;

                $SMF = SelectiveMiniatureFrame::where('quotation_id', $Quotation_Id)->first();
                if($SMF){
                    $SMF->amount = $Cantidad;
                    $SMF->model = $Modelo;
                    $SMF->caliber = $Calibre;
                    $SMF->total_load_kg = $Total_Peso;
                    $SMF->total_poles = $Total_Postes;
                    $SMF->total_crossbars = $Total_Travesanos;
                    $SMF->total_diagonals = $Total_Diagonales;
                    $SMF->total_plates = $Total_Placas;
                    $SMF->total_kg = $Total_Kg;
                    $SMF->total_m2 = $Total_m2;
                    $SMF->sku = $Sku;
                    $SMF->total_price = $Precio_Total + $CostoTotalCalza + $CostoTotalTaquete;
                    $SMF->save();
                }else{
                    $SMF = new SelectiveMiniatureFrame();
                    $SMF->quotation_id = $Quotation_Id;
                    $SMF->amount = $Cantidad;
                    $SMF->model = $Modelo;
                    $SMF->caliber = $Calibre;
                    $SMF->total_load_kg = $Total_Peso;
                    $SMF->total_poles = $Total_Postes;
                    $SMF->total_crossbars = $Total_Travesanos;
                    $SMF->total_diagonals = $Total_Diagonales;
                    $SMF->total_plates = $Total_Placas;
                    $SMF->total_kg = $Total_Kg;
                    $SMF->total_m2 = $Total_m2;
                    $SMF->sku = $Sku;
                    $SMF->total_price = $Precio_Total + $CostoTotalCalza + $CostoTotalTaquete;
                    $SMF->save();
                }

                return view('quotes.selectivo.frames.miniatureframes.store', compact(
                    'Cantidad',
                    'Calibre',
                    'Pandeo',
                    'Peso',
                    'Modelo',
                    'Profundidad',
                    'Altura',
                    'Data',
                    'Total_Peso',
                    'Total_Postes',
                    'Total_Travesanos',
                    'Total_Diagonales',
                    'Total_Placas',
                    'Precio_Total',
                    'Total_Acero_Kg',
                    'Total_Solera_Kg',
                    'Total_Kg',
                    'Total_m2',
                    'Quotation_Id',
                    'Calzas',
                    'CostoCalza',
                    'Taquetes',
                    'CostoTaquete',
                    'CostoTotalCalza',
                    'CostoTotalTaquete',
                    'TotalCalzas',
                    'TotalTaquetes',
                ));
            }else{
                return redirect()->route('miniatureframe.show', $Quotation_Id)->with('no_existe', 'ok');
            }
        }
        else{
            return redirect()->route('miniatureframe.show', $Quotation_Id)->with('no_existe', 'ok');
        }
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
