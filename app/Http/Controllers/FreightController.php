<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Freight;
use App\Models\Packaging;
use App\Models\Transport;
use App\Models\Factor;
use App\Models\TravelAssignment;
use App\Models\Installation;
use App\Models\QuotationInstall;
use App\Models\QuotationTravelAssignment;

use App\Models\QuotationUninstall;
use App\Models\Uninstall;
use Illuminate\Http\Request;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;

class FreightController extends Controller
{

    public function selectivo_show($id)
    {
        $Quotation_Id = $id;
        $Packagings = Packaging::where('quotation_id', $Quotation_Id)->get();
        
        if(count($Packagings)>0){
            $TotalTransports = 0;
            foreach($Packagings as $row){
                $TotalTransports = ($TotalTransports + $row->import);
            }
        }else{
            $TotalTransports = "";
        }
        
        return view('quotes.selectivo.freights.index', compact(
            'Quotation_Id',
            'Packagings',
            'TotalTransports',
        ));
    }

    public function selectivo_transports($id)
    {
        $Quotation_Id = $id;
        $Destinations = Destination::distinct()->get('destination');
        $Units = Destination::distinct()->get('unit');

        return view('quotes.selectivo.freights.transports', compact(
            'Quotation_Id',
            'Destinations',
            'Units',
        ));
    }

    public function selectivo_transports_add(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'destination' => 'required',
            'unit' => 'required',
        ];
        $messages = [
            'amount.required' => 'Por favor capture la cantidad',
            'destination.required' => 'Por favor seleccione un destino',
            'unit.required' => 'Por favor seleccione el tipo de unidad',
        ];
        $request->validate($rules,$messages);

        $Destinations = Destination::where('destination', $request->destination)->where('unit', $request->unit)->first();
        if($Destinations){
            $Cost = $Destinations->cost * $Destinations->f_total;
            $Import = $request->amount * $Cost;

            $Packagings = new Packaging();
            $Packagings->quotation_id = $request->Quotation_Id;
            $Packagings->amount = $request->amount;
            $Packagings->destination = $Destinations->destination;
            $Packagings->state = $Destinations->state;
            $Packagings->unit = $Destinations->unit;
            $Packagings->cost = $Cost;
            $Packagings->import = $Import;
            $Packagings->save();
        }

        return redirect()->route('selectivo_freights.show', $request->Quotation_Id);
    }

    public function selectivo_quotation_travel_assignments($id)
    {
        $Quotation_Id = $id;
        $QuotationTravelAssignments = QuotationTravelAssignment::where('quotation_id', $Quotation_Id)->get();
        if(count($QuotationTravelAssignments)>0){
            $TotalTravelAssignments = 0;
            foreach($QuotationTravelAssignments as $row){
                $TotalTravelAssignments = ($TotalTravelAssignments + $row->import);
            }
            $TotalTravelAssignments = $TotalTravelAssignments;
        }else{
            $TotalTravelAssignments = "";
        }

        return view('quotes.selectivo.travel_assignments.index', compact(
            'Quotation_Id',
            'QuotationTravelAssignments',
            'TotalTravelAssignments',
        ));
    }

    public function selectivo_travel_assignments($id)
    {
        $Quotation_Id = $id;
        $Descriptions = TravelAssignment::distinct()->get('description');

        return view('quotes.selectivo.freights.travel_assignments', compact(
            'Quotation_Id',
            'Descriptions'
        ));
    }

    public function selectivo_travel_assignments_add(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'amount.required' => 'Por favor capture la cantidad',
            'description.required' => 'Por favor seleccione una descripción',
        ];

        $request->validate($rules,$messages);

        $TravelAssignments = TravelAssignment::where('description', $request->description)->first();
        if($TravelAssignments){
            $Cost = $TravelAssignments->cost * $TravelAssignments->f_total;
            $Import = $request->amount * $Cost;
            $QuotationTravelAssignments = new QuotationTravelAssignment();
            $QuotationTravelAssignments->quotation_id = $request->Quotation_Id;
            $QuotationTravelAssignments->amount = $request->amount;
            $QuotationTravelAssignments->description = $TravelAssignments->description;
            $QuotationTravelAssignments->unit = $TravelAssignments->unit;
            $QuotationTravelAssignments->cost = $Cost;
            $QuotationTravelAssignments->import = $Import;
            $QuotationTravelAssignments->save();
        }        

        return redirect()->route('selectivo_quotation_travel_assignments', $request->Quotation_Id);
    }

    public function selectivo_installs($id)
    {
        $Quotation_Id = $id;
        $QuotationInstalls = QuotationInstall::where('quotation_id', $Quotation_Id)->get();
        if(count($QuotationInstalls) > 0){
            $TotalImportInstall = 0;
            foreach($QuotationInstalls as $row){
                $TotalImportInstall = $TotalImportInstall + $row->import;
            }
        }else{
            $TotalImportInstall = 0;
        }
        $QuotationUninstalls = QuotationUninstall::where('quotation_id', $Quotation_Id)->get();
        if(count($QuotationUninstalls) > 0){
            $TotalImportUninstall = 0;
            foreach($QuotationUninstalls as $row){
                $TotalImportUninstall = $TotalImportUninstall + $row->import;
            }
        }else{
            $TotalImportUninstall = 0;
        }
        $TotalImport = $TotalImportInstall + $TotalImportUninstall;

        return view('quotes.selectivo.installations.index', compact(
            'Quotation_Id',
            'QuotationInstalls',
            'QuotationUninstalls',
            'TotalImportInstall',
            'TotalImportUninstall',
            'TotalImport',
        ));
    }

    public function selectivo_fiut_add(Request $request)
    {
        if($request->install == 'SI'){
            if($request->uninstall == 'SI'){
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'Sí';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }                
                $PrintUninstall = 'Sí';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }
            }else{
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'Sí';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }
            }
        }elseif($request->install == 'INCLUIDA'){
            if($request->uninstall == 'INCLUIDA'){
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'In';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }                
                $PrintUninstall = 'In';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }
            }else{
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'In';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }
            }
        }else{
            $PrintInstall = 'No';
            $PrintUninstall = 'No';
            $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->delete();
            $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->delete();
        }
        if($request->uninstall == 'SI'){
            if($request->install == 'SI'){
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'Sí';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }                
                $PrintUninstall = 'Sí';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }                
            }else{
                $rules = [
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintUninstall = 'Sí';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }
            }
        }elseif($request->uninstall == 'INCLUIDA'){
            if($request->install == 'INCLUIDA'){
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'In';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }                
                $PrintUninstall = 'In';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }                
            }else{
                $rules = [
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintUninstall = 'In';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }
            }
        }else{
            $PrintInstall = 'No';
            $PrintUninstall = 'No';
            $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->delete();
            $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->delete();
        }
        return $this->selectivo_installs_add_carrito($request->Quotation_Id);

        
    }

    public function double_deep_show($id)
    {
        $Quotation_Id = $id;
        $Packagings = Packaging::where('quotation_id', $Quotation_Id)->get();
        if(count($Packagings)>0){
            $TotalTransports = 0;
            foreach($Packagings as $row){
                $TotalTransports = ($TotalTransports + $row->import);
            }
        }else{
            $TotalTransports = "";
        }

        return view('quotes.double_deep.freights.index', compact(
            'Quotation_Id',
            'Packagings',
            'TotalTransports',
        ));
    }

    public function double_deep_transports($id)
    {
        $Quotation_Id = $id;
        $Destinations = Destination::distinct()->get('destination');
        $Units = Destination::distinct()->get('unit');

        return view('quotes.double_deep.freights.transports', compact(
            'Quotation_Id',
            'Destinations',
            'Units',
        ));
    }

    public function double_deep_transports_add(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'destination' => 'required',
            'unit' => 'required',
        ];
        $messages = [
            'amount.required' => 'Por favor capture la cantidad',
            'destination.required' => 'Por favor seleccione un destino',
            'unit.required' => 'Por favor seleccione el tipo de unidad',
        ];
        $request->validate($rules,$messages);

        $Destinations = Destination::where('destination', $request->destination)->where('unit', $request->unit)->first();
        if($Destinations){
            $Cost = $Destinations->cost * $Destinations->f_total;
            $Import = $request->amount * $Cost;

            $Packagings = new Packaging();
            $Packagings->quotation_id = $request->Quotation_Id;
            $Packagings->amount = $request->amount;
            $Packagings->destination = $Destinations->destination;
            $Packagings->state = $Destinations->state;
            $Packagings->unit = $Destinations->unit;
            $Packagings->cost = $Cost;
            $Packagings->import = $Import;
            $Packagings->save();
        }

        return redirect()->route('double_deep_freights.show', $request->Quotation_Id);
    }

    public function double_deep_quotation_travel_assignments($id)
    {
        $Quotation_Id = $id;
        $QuotationTravelAssignments = QuotationTravelAssignment::where('quotation_id', $Quotation_Id)->get();
        if(count($QuotationTravelAssignments)>0){
            $TotalTravelAssignments = 0;
            foreach($QuotationTravelAssignments as $row){
                $TotalTravelAssignments = ($TotalTravelAssignments + $row->import);
            }
            $TotalTravelAssignments = $TotalTravelAssignments;
        }else{
            $TotalTravelAssignments = "";
        }

        return view('quotes.double_deep.travel_assignments.index', compact(
            'Quotation_Id',
            'QuotationTravelAssignments',
            'TotalTravelAssignments',
        ));
    }

    public function double_deep_travel_assignments($id)
    {
        $Quotation_Id = $id;
        $Descriptions = TravelAssignment::distinct()->get('description');

        return view('quotes.double_deep.freights.travel_assignments', compact(
            'Quotation_Id',
            'Descriptions',
        ));
    }

    public function double_deep_travel_assignments_add(Request $request)
    {
        $rules = [
            'amount' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'amount.required' => 'Por favor capture la cantidad',
            'description.required' => 'Por favor seleccione una descripción',
        ];

        $request->validate($rules,$messages);

        $TravelAssignments = TravelAssignment::where('description', $request->description)->first();
        if($TravelAssignments){
            $Cost = $TravelAssignments->cost * $TravelAssignments->f_total;
            $Import = $request->amount * $Cost;
            $QuotationTravelAssignments = new QuotationTravelAssignment();
            $QuotationTravelAssignments->quotation_id = $request->Quotation_Id;
            $QuotationTravelAssignments->amount = $request->amount;
            $QuotationTravelAssignments->description = $TravelAssignments->description;
            $QuotationTravelAssignments->unit = $TravelAssignments->unit;
            $QuotationTravelAssignments->cost = $Cost;
            $QuotationTravelAssignments->import = $Import;
            $QuotationTravelAssignments->save();
        }

        return redirect()->route('double_deep_quotation_travel_assignments', $request->Quotation_Id);
    }

    public function double_deep_installs($id)
    {
        $Quotation_Id = $id;
        $QuotationInstalls = QuotationInstall::where('quotation_id', $Quotation_Id)->get();
        if(count($QuotationInstalls) > 0){
            $TotalImportInstall = 0;
            foreach($QuotationInstalls as $row){
                $TotalImportInstall = $TotalImportInstall + $row->import;
            }
        }else{
            $TotalImportInstall = 0;
        }
        $QuotationUninstalls = QuotationUninstall::where('quotation_id', $Quotation_Id)->get();
        if(count($QuotationUninstalls) > 0){
            $TotalImportUninstall = 0;
            foreach($QuotationUninstalls as $row){
                $TotalImportUninstall = $TotalImportUninstall + $row->import;
            }
        }else{
            $TotalImportUninstall = 0;
        }
        $TotalImport = $TotalImportInstall + $TotalImportUninstall;

        return view('quotes.double_deep.installations.index', compact(
            'Quotation_Id',
            'QuotationInstalls',
            'QuotationUninstalls',
            'TotalImportInstall',
            'TotalImportUninstall',
            'TotalImport',
        ));
    }

    public function double_deep_fiut_add(Request $request)
    {
        if($request->install == 'SI'){
            if($request->uninstall == 'SI'){
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'Sí';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }                
                $PrintUninstall = 'Sí';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }
            }else{
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'Sí';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }
            }
        }elseif($request->install == 'INCLUIDA'){
            if($request->uninstall == 'INCLUIDA'){
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'In';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }                
                $PrintUninstall = 'In';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }
            }else{
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'In';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }
            }
        }else{
            $PrintInstall = 'No';
            $PrintUninstall = 'No';
            $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->delete();
            $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->delete();
        }
        if($request->uninstall == 'SI'){
            if($request->install == 'SI'){
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'Sí';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }                
                $PrintUninstall = 'Sí';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }                
            }else{
                $rules = [
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintUninstall = 'Sí';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }
            }
        }elseif($request->uninstall == 'INCLUIDA'){
            if($request->install == 'INCLUIDA'){
                $rules = [
                    'TotalImportInstall' => 'required|not_in:0',
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportInstall.required' => 'Agregue informacióm de la Instalación',
                    'TotalImportInstall.not_in' => 'Agregue por lo menos un concepto a la Instalación',
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintInstall = 'In';
                $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationInstalls as $row)
                {
                    $row->print = $PrintInstall;
                    $row->breakdown_install = NULL;
                    $row->save();
                }                
                $PrintUninstall = 'In';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }                
            }else{
                $rules = [
                    'TotalImportUninstall' => 'required|not_in:0',
                ];
                $messages = [
                    'TotalImportUninstall.required' => 'Agregue información de la desinstalación',
                    'TotalImportUninstall.not_in' => 'Agregue por lo menos un concepto a la Desinstalación',
                ];
                $request->validate($rules,$messages);
                $PrintUninstall = 'In';
                $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->get();
                foreach($QuotationUninstalls as $row)
                {
                    $row->print = $PrintUninstall;
                    $row->breakdown_uninstall = NULL;
                    $row->save();
                }
            }
        }else{
            $PrintInstall = 'No';
            $PrintUninstall = 'No';
            $QuotationInstalls = QuotationInstall::where('quotation_id', $request->Quotation_Id)->delete();
            $QuotationUninstalls = QuotationUninstall::where('quotation_id', $request->Quotation_Id)->delete();
        }
        
        return redirect()->route('double_deep.show', $request->Quotation_Id);
    }

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
    public function fletes_add_carrito($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SFLETE')->get();
        if($cartl2->count()>0){
            foreach($cartl2 as $c){
                Cart_product::destroy($c->id);
            }
            
        }
        //agregar el nuevo al carrito, lo que este en 
        $productos = Packaging::where('quotation_id', $Quotation_Id)->get();
        //guardar en el carrito
        foreach($productos as $p){
            $Cart_product= new Cart_product();
            $Cart_product->name='FLETE';
            $Cart_product->type='SFLETE';
            $Cart_product->unit_price=$p->cost;
            $Cart_product->total_price=$p->import;
            $Cart_product->quotation_id=$Quotation_Id;
            $Cart_product->user_id=Auth::user()->id;
            $Cart_product->amount=$p->amount;
            $Cart_product->save();
        }
        
        
        return redirect()->route('selectivo.show',$Quotation_Id);
    }
    public function viaticos_add_carrito($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SVIAT')->get();
        if($cartl2->count()>0){
            foreach($cartl2 as $c){
                Cart_product::destroy($c->id);
            }
            
        }
        //agregar el nuevo al carrito, lo que este en 
        $productos = QuotationTravelAssignment::where('quotation_id', $Quotation_Id)->get();
        //guardar en el carrito
        foreach($productos as $p){
            $Cart_product= new Cart_product();
            $Cart_product->name='VIATICO';
            $Cart_product->type='SVIAT';
            $Cart_product->unit_price=$p->cost;
            $Cart_product->total_price=$p->import;
            $Cart_product->quotation_id=$Quotation_Id;
            $Cart_product->user_id=Auth::user()->id;
            $Cart_product->amount=$p->amount;
            $Cart_product->save();
        }
        
        return redirect()->route('selectivo.show',$Quotation_Id);
    }
    public function selectivo_installs_add_carrito($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SINS')->get();
        if($cartl2->count()>0){
            foreach($cartl2 as $c){
                Cart_product::destroy($c->id);
            }
        }
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SUINS')->get();
        if($cartl2->count()>0){
            foreach($cartl2 as $c){
                Cart_product::destroy($c->id);
            }
        }
        //agregar el nuevo al carrito, lo que este en 
        $productos = QuotationInstall::where('quotation_id', $Quotation_Id)->get();
        //guardar en el carrito
        foreach($productos as $p){
            $Cart_product= new Cart_product();
            $Cart_product->name='INSTALACION';
            $Cart_product->type='SINS';
            $Cart_product->unit_price=$p->cost;
            $Cart_product->total_price=$p->import;
            $Cart_product->quotation_id=$Quotation_Id;
            $Cart_product->user_id=Auth::user()->id;
            $Cart_product->amount=$p->amount;
            $Cart_product->save();
        }
        $productos = QuotationUnistall::where('quotation_id', $Quotation_Id)->get();
        //guardar en el carrito
        foreach($productos as $p){
            $Cart_product= new Cart_product();
            $Cart_product->name='DESINSTALACION';
            $Cart_product->type='SUINS';
            $Cart_product->unit_price=$p->cost;
            $Cart_product->total_price=$p->import;
            $Cart_product->quotation_id=$Quotation_Id;
            $Cart_product->user_id=Auth::user()->id;
            $Cart_product->amount=$p->amount;
            $Cart_product->save();
        }
        
        
        return redirect()->route('selectivo.show',$Quotation_Id);
    }
}
