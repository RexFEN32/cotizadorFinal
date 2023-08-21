<?php

namespace App\Http\Controllers;

use App\Models\StructuralFrameworks;
use App\Models\PriceStructuralFrameworks;
use App\Models\BucklingStructural;
use App\Models\DepthStructural;
use App\Models\HeightStructural;
use App\Models\PriceList;
use App\Models\PriceListScrew;
use App\Models\SelectiveStructuralFrame;
use Illuminate\Http\Request;

class StructuralFrameworksController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $depth_structural = DepthStructural::all();
        $buckling_structural = BucklingStructural::all();
        $height_structural = HeightStructural::all();

        return view('quotes.selectivo.frames.structuralframeworks.index', compact(
            'depth_structural',
            'buckling_structural',
            'height_structural',
            'Quotation_Id'
        ));
    }
    
    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'weight' => 'required',
            'caliber' => 'required',
            'buckling_structural' => 'required',
            'depth_structural' => 'required',
            'height_structural' => 'required',
        ];

        $messages = [
            'amount.required' => 'Favor de capturar el número de marcos a cotizar',
            'weight.required' => 'Favor de capturar el Peso',
        ];

        $request->validate($rules, $messages);

        $Quotation_Id = $request->Quotation_Id;
        $Cantidad = $request->amount;
        $Calibre = $request->caliber;
        $Pandeo = $request->buckling_structural;
        $Peso = $request->weight;
        $PesoA = ($Peso * 0.1) + $Peso;

        $Models = StructuralFrameworks::where('caliber', $Calibre)->where('buckling', $Pandeo)->where('weight', '>=', $PesoA)->first();
        if($Models){
            $Modelo = $Models->model;
            $Profundidad = $request->depth_structural;
            $Altura = $request->height_structural;

            $Data = PriceStructuralFrameworks::where('caliber', $Calibre)->where('model', $Modelo)->where('depth', $Profundidad)->where('height', $Altura)->first();
            if($Data){
                $Postes = $Data->poles;
                $Travesanos = $Data->crossbars;
                $Diagonales = $Data->diagonals;
                $Placas = $Data->plates;
                $TornTravDiag = ($Travesanos + $Diagonales) * 2;
                $PriceListScrewsTravDiag = PriceListScrew::where('description', 'TORNILLO Y TUERCA 3/8 IN X 1 IN G5 GALV')->first();
                $PriceListScrewCostTravDiag = $PriceListScrewsTravDiag->cost * $PriceListScrewsTravDiag->f_total;
                $CostTornTravDiag = $TornTravDiag * $PriceListScrewCostTravDiag;
                $TotTornTravDiag = $Cantidad * $TornTravDiag;
                $TotCostTornTravDiag = $Cantidad * $CostTornTravDiag;
                $Precio = $Data->price + $CostTornTravDiag;
                $Precio_Total = $Cantidad * $Precio;
                $Calzas = 4;
                $CostoCalzas = PriceList::where('piece', 'CALZAS')->first();
                $CostoCalza = $CostoCalzas->cost * $CostoCalzas->f_total;
                $Taquetes = 4;
                $CostoTaquetes = PriceListScrew::where('description', 'TAQUETE')->first();
                $CostoTaquete = $CostoTaquetes->cost * $CostoTaquetes->f_total;

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
                $CostoTotalCalza = ($CostoCalza * 4) * $Cantidad;
                $CostoTotalTaquete = ($CostoTaquete * 4) * $Cantidad;
                $TotalCalzas = $Cantidad * 4;
                $TotalTaquetes = $Cantidad * 4;

                $SF = SelectiveStructuralFrame::where('quotation_id', $Quotation_Id)->first();
                if($SF){
                    $SF->amount = $Cantidad;
                    $SF->model = $Modelo;
                    $SF->caliber = $Calibre;
                    $SF->total_load_kg = $Total_Peso;
                    $SF->total_poles = $Total_Postes;
                    $SF->total_crossbars = $Total_Travesanos;
                    $SF->total_diagonals = $Total_Diagonales;
                    $SF->total_plates = $Total_Placas;
                    $SF->total_kg = $Total_Kg;
                    $SF->total_m2 = $Total_m2;
                    $SF->sku = $Sku;
                    $SF->total_price = $Precio_Total + $CostoTotalCalza + $CostoTotalTaquete;
                    $SF->save();
                }else{
                    $SF = new SelectiveStructuralFrame();
                    $SF->quotation_id = $Quotation_Id;
                    $SF->amount = $Cantidad;
                    $SF->model = $Modelo;
                    $SF->caliber = $Calibre;
                    $SF->total_load_kg = $Total_Peso;
                    $SF->total_poles = $Total_Postes;
                    $SF->total_crossbars = $Total_Travesanos;
                    $SF->total_diagonals = $Total_Diagonales;
                    $SF->total_plates = $Total_Placas;
                    $SF->total_kg = $Total_Kg;
                    $SF->total_m2 = $Total_m2;
                    $SF->sku = $Sku;
                    $SF->total_price = $Precio_Total + $CostoTotalCalza + $CostoTotalTaquete;
                    $SF->save();
                }

                return view('quotes.selectivo.frames.structuralframeworks.store', compact(
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
                    'Postes',
                    'Travesanos',
                    'Diagonales',
                    'Placas',
                    'TornTravDiag',
                    'PriceListScrewsTravDiag',
                    'PriceListScrewCostTravDiag',
                    'CostTornTravDiag',
                    'TotTornTravDiag',
                    'TotCostTornTravDiag',
                    'Precio',
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
                return redirect()->route('structuralframeworks.show', $Quotation_Id)->with('no_existe', 'ok');
            }
        }
        else{
            return redirect()->route('structuralframeworks.show', $Quotation_Id)->with('no_existe', 'ok');
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
