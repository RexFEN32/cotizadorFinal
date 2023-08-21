<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MaterialListEngineering;
use App\Models\Questionary;
use App\Models\QuestionaryChart;
use App\Models\QuestionaryLayout;
use App\Models\Quotation;
use App\Models\vcustomers;
use Illuminate\Http\Request;
use League\CommonMark\Extension\SmartPunct\Quote;

class DashboardController extends Controller
{
    public function index()
    {
        return view('quotes.index');
    }

    public function open_request()
    {
        return view('quotes.open_request');
    }

    public function quoter($id)
    {
        if($id == 1){
            $Systems = 'SISTEMAS DE ALMACENAMIENTO (RACKS)';
        }elseif($id == 2){
            $Systems = 'MANEJO DE MATERIALES (CONVEYORS)';
        }elseif($id == 3){
            $Systems = 'EQUIPO AUXILIAR PARA ALMACEN';
        }elseif($id == 4){
            $Systems = 'AUTOMATIZACIÓN (PICK TO LIGHT/WMS)';
        }
        
        $Customers = Customer::all();

        return view('quotes.quoter', compact('Customers', 'Systems'));
    }

    public function rack_engineering(Request $request)
    {
        $customer_id = $request->customer;
        $Systems = $request->system;
        $Customers = Customer::find($customer_id);

        $Quoters = Quotation::orderBy('id', 'DESC')->first();
        $Quoters->invoice;
        if($Quoters){
            $Invoice = $Quoters->invoice + 1;
        }else{
            $Invoice = '1000';
        }

        $User = auth()->user();

        $Quoter = new Quotation();
        $Quoter->invoice = $Invoice;
        $Quoter->system = $Systems;
        $Quoter->customer_id = $Customers->id;
        $Quoter->type = Null;
        $Quoter->user_id = $User->id;
        $Quoter->system_price = Null;
        $Quoter->installation_price = Null;
        $Quoter->transfer_price = Null;
        $Quoter->status = 'Iniciada';
        $Quoter->save();

        $Quotes = Quotation::orderBy('id', 'DESC')->first();
        $Quotation_Id = $Quotes->id;
        $Quotations = Quotation::find($Quotation_Id);

        return view('quotes.rack_engineering', compact('Customers', 'Systems', 'Quotations'));
    }

    public function cuestionario_inicial(Request $request)
    {
        // $rules = [
        //     'a1' => 'required',
        //     'a2' => 'required',
        //     'a3' => 'required',
        //     'a4' => 'required',
        //     'a5' => 'required',
        //     'a6' => 'required',
        //     'a7' => 'required',
        //     'a8' => 'required',
        //     'a9' => 'required',
        //     'a10' => 'required',
        //     'a11' => 'required',
        //     'a25' => 'required',
        //     'a26' => 'required',
        //     'a27' => 'required',
        //     'a28' => 'required',
        //     'a29' => 'required',
        //     'a30' => 'required',
        //     'a31' => 'required',
        //     'a32' => 'required',
        //     'a33' => 'required',
        //     'a34' => 'required',
        //     'a35' => 'required',
        //     'a36' => 'required',
        //     'a37' => 'required',
        //     'a38' => 'required',
        // ];

        // $messages = [
        //     'a1.required' => 'Por favor capture o seleccione su respuesta',
        //     'a2.required' => 'Por favor capture o seleccione su respuesta',
        //     'a3.required' => 'Por favor capture o seleccione su respuesta',
        //     'a4.required' => 'Por favor capture o seleccione su respuesta',
        //     'a5.required' => 'Por favor capture o seleccione su respuesta',
        //     'a6.required' => 'Por favor capture o seleccione su respuesta',
        //     'a7.required' => 'Por favor capture o seleccione su respuesta',
        //     'a8.required' => 'Por favor capture o seleccione su respuesta',
        //     'a9.required' => 'Por favor capture o seleccione su respuesta',
        //     'a10.required' => 'Por favor capture o seleccione su respuesta',
        //     'a11.required' => 'Por favor capture o seleccione su respuesta',
        //     'a25.required' => 'Por favor capture o seleccione su respuesta',
        //     'a26.required' => 'Por favor capture o seleccione su respuesta',
        //     'a27.required' => 'Por favor capture o seleccione su respuesta',
        //     'a28.required' => 'Por favor capture o seleccione su respuesta',
        //     'a29.required' => 'Por favor capture o seleccione su respuesta',
        //     'a30.required' => 'Por favor capture o seleccione su respuesta',
        //     'a31.required' => 'Por favor capture o seleccione su respuesta',
        //     'a32.required' => 'Por favor capture o seleccione su respuesta',
        //     'a33.required' => 'Por favor capture o seleccione su respuesta',
        //     'a34.required' => 'Por favor capture o seleccione su respuesta',
        //     'a35.required' => 'Por favor capture o seleccione su respuesta',
        //     'a36.required' => 'Por favor capture o seleccione su respuesta',
        //     'a37.required' => 'Por favor capture o seleccione su respuesta',
        //     'a38.required' => 'Por favor capture o seleccione su respuesta',
        // ];

        // $request->validate($rules,$messages);

        return $Quotation_Id = $request->quotations_id;

        $Questionary = QuestionaryChart::where('quotation_id', $Quotation_Id)->first();
        if(!$Questionary){
            $Questionary = new Questionary();
            $Questionary->quotation_id = $Quotation_Id;
            $Questionary->a1 = $request->a1;
            $Questionary->a2 = $request->a2;
            $Questionary->a3 = $request->a3;
            $Questionary->a4 = $request->a4;
            $Questionary->a5 = $request->a5;
            $Questionary->a6 = $request->a6;
            $Questionary->a7 = $request->a7;
            $Questionary->a8 = $request->a8;
            $Questionary->a9 = $request->a9;
            $Questionary->a10 = $request->a10;
            $Questionary->a11 = $request->a11;
            $Questionary->a12 = $request->a12;
            $Questionary->a13 = $request->a13;
            $Questionary->a14 = $request->a14;
            $Questionary->a15 = $request->a15;
            $Questionary->a16 = $request->a16;
            $Questionary->a17 = $request->a17;
            $Questionary->a18 = $request->a18;
            $Questionary->a19 = $request->a19;
            $Questionary->a20 = $request->a20;
            $Questionary->a21 = $request->a21;
            $Questionary->a22 = $request->a22;
            $Questionary->a23 = $request->a23;
            $Questionary->a24 = $request->a24;
            $Questionary->a25 = $request->a25;
            $Questionary->a26 = $request->a26;
            $Questionary->a27 = $request->a27;
            $Questionary->a28 = $request->a28;
            $Questionary->a29 = $request->a29;
            $Questionary->a30 = $request->a30;
            $Questionary->a31 = $request->a31;
            $Questionary->a32 = $request->a32;
            $Questionary->a33 = $request->a33;
            $Questionary->a34 = $request->a34;
            $Questionary->a35 = $request->a35;
            $Questionary->a36 = $request->a36;
            $Questionary->a37 = $request->a37;
            $Questionary->a38 = $request->a38;
            $Questionary->a39 = $request->a39;
            $Questionary->a40 = $request->a40;
            $Questionary->a41 = $request->a41;
            $Questionary->a42 = $request->a42;
            $Questionary->a43 = $request->a43;
            $Questionary->a44 = $request->a44;
            $Questionary->a45 = $request->a45;
            $Questionary->a46 = $request->a46;
            $Questionary->a47 = $request->a47;
            $Questionary->a48 = $request->a48;
            $Questionary->a49 = $request->a49;
            $Questionary->a50 = $request->a50;
            $Questionary->a51 = $request->a51;
            $Questionary->a52 = $request->a52;
            $Questionary->a53 = $request->a53;
            $Questionary->a54 = $request->a54;
            $Questionary->a55 = $request->a55;
            $Questionary->a56 = $request->a56;
            $Questionary->a57 = $request->a57;
            $Questionary->a58 = $request->a58;
            $Questionary->a59 = $request->a59;
            $Questionary->a60 = $request->a60;
            $Questionary->a61 = $request->a61;
            $Questionary->a62 = $request->a62;
            $Questionary->a63 = $request->a63;
            $Questionary->save();
        }else{
            $Questionary->quotation_id = $Quotation_Id;
            $Questionary->a1 = $request->a1;
            $Questionary->a2 = $request->a2;
            $Questionary->a3 = $request->a3;
            $Questionary->a4 = $request->a4;
            $Questionary->a5 = $request->a5;
            $Questionary->a6 = $request->a6;
            $Questionary->a7 = $request->a7;
            $Questionary->a8 = $request->a8;
            $Questionary->a9 = $request->a9;
            $Questionary->a10 = $request->a10;
            $Questionary->a11 = $request->a11;
            $Questionary->a12 = $request->a12;
            $Questionary->a13 = $request->a13;
            $Questionary->a14 = $request->a14;
            $Questionary->a15 = $request->a15;
            $Questionary->a16 = $request->a16;
            $Questionary->a17 = $request->a17;
            $Questionary->a18 = $request->a18;
            $Questionary->a19 = $request->a19;
            $Questionary->a20 = $request->a20;
            $Questionary->a21 = $request->a21;
            $Questionary->a22 = $request->a22;
            $Questionary->a23 = $request->a23;
            $Questionary->a24 = $request->a24;
            $Questionary->a25 = $request->a25;
            $Questionary->a26 = $request->a26;
            $Questionary->a27 = $request->a27;
            $Questionary->a28 = $request->a28;
            $Questionary->a29 = $request->a29;
            $Questionary->a30 = $request->a30;
            $Questionary->a31 = $request->a31;
            $Questionary->a32 = $request->a32;
            $Questionary->a33 = $request->a33;
            $Questionary->a34 = $request->a34;
            $Questionary->a35 = $request->a35;
            $Questionary->a36 = $request->a36;
            $Questionary->a37 = $request->a37;
            $Questionary->a38 = $request->a38;
            $Questionary->a39 = $request->a39;
            $Questionary->a40 = $request->a40;
            $Questionary->a41 = $request->a41;
            $Questionary->a42 = $request->a42;
            $Questionary->a43 = $request->a43;
            $Questionary->a44 = $request->a44;
            $Questionary->a45 = $request->a45;
            $Questionary->a46 = $request->a46;
            $Questionary->a47 = $request->a47;
            $Questionary->a48 = $request->a48;
            $Questionary->a49 = $request->a49;
            $Questionary->a50 = $request->a50;
            $Questionary->a51 = $request->a51;
            $Questionary->a52 = $request->a52;
            $Questionary->a53 = $request->a53;
            $Questionary->a54 = $request->a54;
            $Questionary->a55 = $request->a55;
            $Questionary->a56 = $request->a56;
            $Questionary->a57 = $request->a57;
            $Questionary->a58 = $request->a58;
            $Questionary->a59 = $request->a59;
            $Questionary->a60 = $request->a60;
            $Questionary->a61 = $request->a61;
            $Questionary->a62 = $request->a62;
            $Questionary->a63 = $request->a63;
            $Questionary->save();
        }

        // $QuestionaryCharts = QuestionaryChart::where('quotation_id', $Quotation_Id)->get();

        // return view('quotes.material_list_engineering', compact('Quotation_Id', 'QuestionaryCharts'));

        // $Quotation_Id = $request->quotations_id;

        // return view('quotes.layout_quoter', compact('Quotation_Id'));
    }

    public function return_material_list($id)
    {
        $Quotation_Id = $id;
        $QuestionaryCharts = QuestionaryChart::where('quotation_id', $Quotation_Id)->get();

        return view('quotes.material_list_engineering', compact('Quotation_Id', 'QuestionaryCharts'));
    }

    public function layout_quoter(Request $request)
    {
        $Quotation_Id = $request->quotations_id;

        return view('quotes.layout_quoter', compact('Quotation_Id'));
    }

    public function photos_quoter(Request $request)
    {
        $Quotation_Id = $request->quotations_id;
        $Layouts = QuestionaryLayout::where('quotation_id', $Quotation_Id)->first();
        if($Layouts){
            if($request->layout){
                $Layouts->layout = $request->layout;
                $Layouts->save();
            }
        }else{
            if($request->layout){
                $Layout = new QuestionaryLayout();
                $Layout->quotation_id = $request->quotations_id;
                $Layout->layout = $request->layout;
                $Layout->save();
            }
        }

        return view('quotes.photos_quoter', compact('Quotation_Id'));
    }

    public function addphotos($id)
    {
        $Quotation_Id = $id;

        return view('quotes.menu', compact('Quotation_Id'));
    }

    public function product_menu(Request $request)
    {
        $Quotation_Id = $request->quotations_id;

        return view('quotes.menu', compact('Quotation_Id'));
    }

    public function material_list_engineering_form(Request $request)
    {   
        $material_list = new MaterialListEngineering();
        $material_list->item = $request->item;
        $material_list->description = $request->description;
        $material_list->amount = $request->amount;
        $material_list->dimensions = $request->dimensions;
        $material_list->caliber = $request->caliber;
        $material_list->color = $request->color;
        $material_list->galv = $request->galv;
        $material_list->no_color = $request->no_color;
        $material_list->save();

        $Materials = MaterialListEngineering::all();

        return view('quoter.material_list_engineering_form', compact(
            'Materials',
        ));
    }

    
}
