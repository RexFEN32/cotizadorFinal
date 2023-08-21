<?php

namespace App\Http\Controllers;

use App\Models\Buckling;
use App\Models\Depth;
use App\Models\DoubleDeepHeavyLoadFrame;
use App\Models\Frame;
use App\Models\Height;
use App\Models\PriceFrame;
use App\Models\PriceListScrew;
use Illuminate\Http\Request;

class DoubleDeepFramesController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $depth = Depth::all();
        $buckling = Buckling::all();
        $height = Height::all();

        return view('quotes.double_deep.frames.heavyloads.index', compact(
            'depth',
            'buckling',
            'height',
            'Quotation_Id'
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'weight' => 'required',
            'caliber' => 'required',
            'buckling' => 'required',
            'depth' => 'required',
            'height' => 'required',
        ];

        $messages = [
            'amount.required' => 'Favor de capturar el número de marcos a cotizar',
            'weight.required' => 'Favor de capturar el Peso',
        ];

        $request->validate($rules, $messages);

        $Quotation_Id = $request->Quotation_Id;
        $Cantidad = $request->amount;
        $Calibre = $request->caliber;
        $Pandeo = $request->buckling;
        $Peso = $request->weight;
        $PesoA = ($Peso * 0.1) + $Peso;

        $Models = Frame::where('caliber', $Calibre)->where('buckling', $Pandeo)->where('weight', '>=', $PesoA)->first();
        if($Models){
            $Modelo = $Models->model;
            $Profundidad = $request->depth;
            $Altura = $request->height;

            $Data = PriceFrame::where('caliber', $Calibre)->where('model', $Modelo)->where('depth', $Profundidad)->where('height', $Altura)->first();
            if($Data){
                $Postes = $Data->poles;
                $Travesanos = $Data->crossbars;
                $Diagonales = $Data->diagonals;
                $Placas = $Data->plates;
                $TornTravDiag = ($Travesanos + $Diagonales) * 4;
                $TornPlacas = $Placas * 2;
                $PriceListScrewsTravDiag = PriceListScrew::where('description', 'TORNILLO Y TUERCA 5/16 I X 5/8 IN G5 GALV')->first();
                $PriceListScrewCostTravDiag = $PriceListScrewsTravDiag->cost * $PriceListScrewsTravDiag->f_total;
                $CostTornTravDiag = $TornTravDiag * $PriceListScrewCostTravDiag;
                $TotTornTravDiag = $Cantidad * $TornTravDiag;
                $TotCostTornTravDiag = $Cantidad * $CostTornTravDiag;
                $PriceListScrewsPlacas = PriceListScrew::where('description', 'TORNILLO Y TUERCA 3/8 IN X 1 IN G5 GALV')->first();
                $PriceListScrewCostPlacas = $PriceListScrewsPlacas->cost * $PriceListScrewsPlacas->f_total;
                $CostTornPlacas = $TornPlacas * $PriceListScrewCostPlacas;
                $TotTornPlacas = $Cantidad * $TornPlacas;
                $TotCostTornPlacas = $Cantidad * $CostTornPlacas;
                $Precio = $Data->price + $CostTornPlacas + $CostTornTravDiag;
                $Precio_Total = $Cantidad * $Precio;

                $Total_Peso = $Cantidad * $Peso;
                $Total_Postes = $Cantidad * $Data->poles;
                $Total_Travesanos = $Cantidad * $Data->crossbars;
                $Total_Diagonales = $Cantidad * $Data->diagonals;
                $Total_Placas = $Cantidad * $Data->plates;
                $Total_Acero_Kg = $Cantidad * $Data->steel_weight_kg;
                $Total_Solera_Kg = $Cantidad * $Data->solera_weight_kg;
                $Total_Kg = $Cantidad * $Data->total_kg;
                $Total_m2 = $Cantidad * $Data->total_m2;
                $Sku = $Data->sku;

                $SHLF = DoubleDeepHeavyLoadFrame::where('quotation_id', $Quotation_Id)->first();
                if($SHLF){
                    $SHLF->amount = $Cantidad;
                    $SHLF->model = $Modelo;
                    $SHLF->caliber = $Calibre;
                    $SHLF->total_load_kg = $Total_Peso;
                    $SHLF->total_poles = $Total_Postes;
                    $SHLF->total_crossbars = $Total_Travesanos;
                    $SHLF->total_diagonals = $Total_Diagonales;
                    $SHLF->total_plates = $Total_Placas;
                    $SHLF->total_kg = $Total_Kg;
                    $SHLF->total_m2 = $Total_m2;
                    $SHLF->sku = $Sku;
                    $SHLF->total_price = $Precio_Total;
                    $SHLF->save();
                }else{
                    $SHLF = new DoubleDeepHeavyLoadFrame();
                    $SHLF->quotation_id = $Quotation_Id;
                    $SHLF->amount = $Cantidad;
                    $SHLF->model = $Modelo;
                    $SHLF->caliber = $Calibre;
                    $SHLF->total_load_kg = $Total_Peso;
                    $SHLF->total_poles = $Total_Postes;
                    $SHLF->total_crossbars = $Total_Travesanos;
                    $SHLF->total_diagonals = $Total_Diagonales;
                    $SHLF->total_plates = $Total_Placas;
                    $SHLF->total_kg = $Total_Kg;
                    $SHLF->total_m2 = $Total_m2;
                    $SHLF->sku = $Sku;
                    $SHLF->total_price = $Precio_Total;
                    $SHLF->save();
                }

                return view('quotes.double_deep.frames.heavyloads.store', compact(
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
                    'TornPlacas',
                    'PriceListScrewsTravDiag',
                    'PriceListScrewCostTravDiag',
                    'CostTornTravDiag',
                    'TotTornTravDiag',
                    'TotCostTornTravDiag',
                    'PriceListScrewsPlacas',
                    'PriceListScrewCostPlacas',
                    'CostTornPlacas',
                    'TotTornPlacas',
                    'TotCostTornPlacas',
                    'Precio',
                ));
            }else{
                return redirect()->route('double_deep_frames.show',$Quotation_Id)->with('no_existe', 'ok');
            }
        }
        else{
            return redirect()->route('double_deep_frames.show',$Quotation_Id)->with('no_existe', 'ok');
        }
    }
}
