<?php

namespace App\Http\Controllers;

use App\Models\Frame;
use App\Models\PriceFrame;
use App\Models\Buckling;
use App\Models\Depth;
use App\Models\Height;
use App\Models\PriceList;
use App\Models\PriceListScrew;
use App\Models\SelectiveHeavyLoadFrame;
use Illuminate\Http\Request;

class FramesController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $depth = Depth::all();
        $buckling = Buckling::all();
        $height = Height::all();

        return view('quotes.selectivo.frames.heavyloads.index', compact(
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
                $Total_Acero_Kg = $Cantidad * $Data->steel_weight_kg;
                $Total_Solera_Kg = $Cantidad * $Data->solera_weight_kg;
                $Total_Kg = $Cantidad * $Data->total_kg;
                $Total_m2 = $Cantidad * $Data->total_m2;
                $Sku = $Data->sku;
                $TotalCalzas = $Cantidad * 4;
                $TotalTaquetes = $Cantidad * 4;
                $CostoTotalCalza = ($CostoCalza * 4) * $Cantidad;
                $CostoTotalTaquete = ($CostoTaquete * 4) * $Cantidad;

                $SHLF = SelectiveHeavyLoadFrame::where('quotation_id', $Quotation_Id)->first();
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
                    $SHLF->total_price = $Precio_Total + $CostoTotalCalza + $CostoTotalTaquete;
                    $SHLF->save();
                }else{
                    $SHLF = new SelectiveHeavyLoadFrame();
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
                    $SHLF->total_price = $Precio_Total + $CostoTotalCalza + $CostoTotalTaquete;
                    $SHLF->save();
                }

                return view('quotes.selectivo.frames.heavyloads.store', compact(
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
                return redirect()->route('frames.show',$Quotation_Id)->with('no_existe', 'ok');
            }
        }
        else{
            return redirect()->route('frames.show',$Quotation_Id)->with('no_existe', 'ok');
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
