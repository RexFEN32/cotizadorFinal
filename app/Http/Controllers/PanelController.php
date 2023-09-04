<?php

namespace App\Http\Controllers;

use App\Models\ChairJoistGalvanizedPanel;
use App\Models\ChairJoistLPaintedPanel;
use App\Models\PriceList;
use App\Models\QuotChairJGalvanizedPanel;
use App\Models\QuotChairJPaintedPanel;
use App\Models\Quot2JGalvanizedPanel;
use App\Models\Quot2JPaintedPanel;
use App\Models\Quot25JGalvanizedPanel;
use App\Models\Quot25JPaintedPanel;
use App\Models\TwoInJoistLGalvanizedPanel;
use App\Models\TwoInJoistLPaintedPanel;
use App\Models\TwoPointFiveInJoistLGalvanizedPanel;
use App\Models\TwoPointFiveInJoistLPaintedPanel;

use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;
use App\Models\Quotation;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function selectivo_panels($id)
    {
        $Quotation_Id = $id;

        return view('quotes.selectivo.panels.index', compact(
            'Quotation_Id',
        ));
    }

    public function selectivo_two_in_joist_l_galvanized_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = TwoInJoistLGalvanizedPanel::distinct()->get('caliber');
        $FrameBackgrounds = TwoInJoistLGalvanizedPanel::distinct()->get('frame_background');
        $LengthDimensions = TwoInJoistLGalvanizedPanel::distinct()->get('length_dimension');
        
        return view('quotes.selectivo.panels.two_in_joist_l_galvanized_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function selectivo_two_in_joist_l_painted_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = TwoInJoistLPaintedPanel::distinct()->get('caliber');
        $FrameBackgrounds = TwoInJoistLPaintedPanel::distinct()->get('frame_background');
        $LengthDimensions = TwoInJoistLPaintedPanel::distinct()->get('length_dimension');
        
        return view('quotes.selectivo.panels.two_in_joist_l_painted_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function selectivo_two_point_five_in_joist_l_galvanized_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = TwoPointFiveInJoistLGalvanizedPanel::distinct()->get('caliber');
        $FrameBackgrounds = TwoPointFiveInJoistLGalvanizedPanel::distinct()->get('frame_background');
        $LengthDimensions = TwoPointFiveInJoistLGalvanizedPanel::distinct()->get('length_dimension');
        
        return view('quotes.selectivo.panels.two_point_five_in_joist_l_galvanized_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function selectivo_two_point_five_in_joist_l_painted_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = TwoPointFiveInJoistLPaintedPanel::distinct()->get('caliber');
        $FrameBackgrounds = TwoPointFiveInJoistLPaintedPanel::distinct()->get('frame_background');
        $LengthDimensions = TwoPointFiveInJoistLPaintedPanel::distinct()->get('length_dimension');
        
        return view('quotes.selectivo.panels.two_point_five_in_joist_l_painted_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function selectivo_chair_joist_galvanized_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = ChairJoistGalvanizedPanel::distinct()->get('caliber');
        $FrameBackgrounds = ChairJoistGalvanizedPanel::distinct()->get('frame_background');
        $LengthDimensions = ChairJoistGalvanizedPanel::distinct()->get('length_dimension');
        
        return view('quotes.selectivo.panels.chair_joist_galvanized_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function selectivo_chair_joist_l_painted_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = ChairJoistLPaintedPanel::distinct()->get('caliber');
        $FrameBackgrounds = ChairJoistLPaintedPanel::distinct()->get('frame_background');
        $LengthDimensions = ChairJoistLPaintedPanel::distinct()->get('length_dimension');
        
        return view('quotes.selectivo.panels.chair_joist_l_painted_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function selectivo_two_in_joist_l_galvanized_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $TwoInJoistLGalvanizedPanel = TwoInJoistLGalvanizedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($TwoInJoistLGalvanizedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Galvanizada')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $TwoInJoistLGalvanizedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $TwoInJoistLGalvanizedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $TwoInJoistLGalvanizedPanel->sku;
            $M2 = $TwoInJoistLGalvanizedPanel->m2;

            $Quot2JGalvanizedPanel = Quot2JGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();

            if($Quot2JGalvanizedPanel)
            {
                $Quot2JGalvanizedPanel->sku = $Sku;
                $Quot2JGalvanizedPanel->amount = $Amount;
                $Quot2JGalvanizedPanel->caliber = $Caliber;
                $Quot2JGalvanizedPanel->frame_background = $FrameBackgrounds;
                $Quot2JGalvanizedPanel->length_dimension = $LengthDimension;
                $Quot2JGalvanizedPanel->weight = $Weight;
                $Quot2JGalvanizedPanel->total_weight = $TotalWeight;
                $Quot2JGalvanizedPanel->m2 = $M2;
                $Quot2JGalvanizedPanel->price_unit = $PriceUnit;
                $Quot2JGalvanizedPanel->total_price = $TotalPrice;
                $Quot2JGalvanizedPanel->save();
            }else{
                $Quot2JGalvanizedPanel = new Quot2JGalvanizedPanel();
                $Quot2JGalvanizedPanel->quotation_id = $Quotation_Id;
                $Quot2JGalvanizedPanel->sku = $Sku;
                $Quot2JGalvanizedPanel->amount = $Amount;
                $Quot2JGalvanizedPanel->caliber = $Caliber;
                $Quot2JGalvanizedPanel->frame_background = $FrameBackgrounds;
                $Quot2JGalvanizedPanel->length_dimension = $LengthDimension;
                $Quot2JGalvanizedPanel->weight = $Weight;
                $Quot2JGalvanizedPanel->total_weight = $TotalWeight;
                $Quot2JGalvanizedPanel->m2 = $M2;
                $Quot2JGalvanizedPanel->price_unit = $PriceUnit;
                $Quot2JGalvanizedPanel->total_price = $TotalPrice;
                $Quot2JGalvanizedPanel->save();
            }

            return view('quotes.selectivo.panels.two_in_joist_l_galvanized_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('selectivo_two_in_joist_l_galvanized_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function selectivo_two_in_joist_l_painted_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $TwoInJoistLPaintedPanel = TwoInJoistLPaintedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($TwoInJoistLPaintedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Negra')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $TwoInJoistLPaintedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $TwoInJoistLPaintedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $TwoInJoistLPaintedPanel->sku;
            $M2 = $TwoInJoistLPaintedPanel->m2;

            $Quot2JPaintedPanel = Quot2JPaintedPanel::where('quotation_id', $Quotation_Id)->first();

            if($Quot2JPaintedPanel)
            {
                $Quot2JPaintedPanel->sku = $Sku;
                $Quot2JPaintedPanel->amount = $Amount;
                $Quot2JPaintedPanel->caliber = $Caliber;
                $Quot2JPaintedPanel->frame_background = $FrameBackgrounds;
                $Quot2JPaintedPanel->length_dimension = $LengthDimension;
                $Quot2JPaintedPanel->weight = $Weight;
                $Quot2JPaintedPanel->total_weight = $TotalWeight;
                $Quot2JPaintedPanel->m2 = $M2;
                $Quot2JPaintedPanel->price_unit = $PriceUnit;
                $Quot2JPaintedPanel->total_price = $TotalPrice;
                $Quot2JPaintedPanel->save();
            }else{
                $Quot2JPaintedPanel = new Quot2JPaintedPanel();
                $Quot2JPaintedPanel->quotation_id = $Quotation_Id;
                $Quot2JPaintedPanel->sku = $Sku;
                $Quot2JPaintedPanel->amount = $Amount;
                $Quot2JPaintedPanel->caliber = $Caliber;
                $Quot2JPaintedPanel->frame_background = $FrameBackgrounds;
                $Quot2JPaintedPanel->length_dimension = $LengthDimension;
                $Quot2JPaintedPanel->weight = $Weight;
                $Quot2JPaintedPanel->total_weight = $TotalWeight;
                $Quot2JPaintedPanel->m2 = $M2;
                $Quot2JPaintedPanel->price_unit = $PriceUnit;
                $Quot2JPaintedPanel->total_price = $TotalPrice;
                $Quot2JPaintedPanel->save();
            }

            return view('quotes.selectivo.panels.two_in_joist_l_painted_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('selectivo_two_in_joist_l_painted_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function selectivo_two_point_five_in_joist_l_galvanized_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $TwoPointFiveInJoistLGalvanizedPanel = TwoPointFiveInJoistLGalvanizedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($TwoPointFiveInJoistLGalvanizedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Galvanizada')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $TwoPointFiveInJoistLGalvanizedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $TwoPointFiveInJoistLGalvanizedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $TwoPointFiveInJoistLGalvanizedPanel->sku;
            $M2 = $TwoPointFiveInJoistLGalvanizedPanel->m2;

            $Quot25JGalvanizedPanel = Quot25JGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();

            if($Quot25JGalvanizedPanel)
            {
                $Quot25JGalvanizedPanel->sku = $Sku;
                $Quot25JGalvanizedPanel->amount = $Amount;
                $Quot25JGalvanizedPanel->caliber = $Caliber;
                $Quot25JGalvanizedPanel->frame_background = $FrameBackgrounds;
                $Quot25JGalvanizedPanel->length_dimension = $LengthDimension;
                $Quot25JGalvanizedPanel->weight = $Weight;
                $Quot25JGalvanizedPanel->total_weight = $TotalWeight;
                $Quot25JGalvanizedPanel->m2 = $M2;
                $Quot25JGalvanizedPanel->price_unit = $PriceUnit;
                $Quot25JGalvanizedPanel->total_price = $TotalPrice;
                $Quot25JGalvanizedPanel->save();
            }else{
                $Quot25JGalvanizedPanel = new Quot25JGalvanizedPanel();
                $Quot25JGalvanizedPanel->quotation_id = $Quotation_Id;
                $Quot25JGalvanizedPanel->sku = $Sku;
                $Quot25JGalvanizedPanel->amount = $Amount;
                $Quot25JGalvanizedPanel->caliber = $Caliber;
                $Quot25JGalvanizedPanel->frame_background = $FrameBackgrounds;
                $Quot25JGalvanizedPanel->length_dimension = $LengthDimension;
                $Quot25JGalvanizedPanel->weight = $Weight;
                $Quot25JGalvanizedPanel->total_weight = $TotalWeight;
                $Quot25JGalvanizedPanel->m2 = $M2;
                $Quot25JGalvanizedPanel->price_unit = $PriceUnit;
                $Quot25JGalvanizedPanel->total_price = $TotalPrice;
                $Quot25JGalvanizedPanel->save();
            }

            return view('quotes.selectivo.panels.two_point_five_in_joist_l_galvanized_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('selectivo_two_point_five_in_joist_l_galvanized_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function selectivo_two_point_five_in_joist_l_painted_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $TwoPointFiveInJoistLPaintedPanel = TwoPointFiveInJoistLPaintedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($TwoPointFiveInJoistLPaintedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Negra')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $TwoPointFiveInJoistLPaintedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $TwoPointFiveInJoistLPaintedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $TwoPointFiveInJoistLPaintedPanel->sku;
            $M2 = $TwoPointFiveInJoistLPaintedPanel->m2;

            $Quot25JPaintedPanel = Quot25JPaintedPanel::where('quotation_id', $Quotation_Id)->first();

            if($Quot25JPaintedPanel)
            {
                $Quot25JPaintedPanel->sku = $Sku;
                $Quot25JPaintedPanel->amount = $Amount;
                $Quot25JPaintedPanel->caliber = $Caliber;
                $Quot25JPaintedPanel->frame_background = $FrameBackgrounds;
                $Quot25JPaintedPanel->length_dimension = $LengthDimension;
                $Quot25JPaintedPanel->weight = $Weight;
                $Quot25JPaintedPanel->total_weight = $TotalWeight;
                $Quot25JPaintedPanel->m2 = $M2;
                $Quot25JPaintedPanel->price_unit = $PriceUnit;
                $Quot25JPaintedPanel->total_price = $TotalPrice;
                $Quot25JPaintedPanel->save();
            }else{
                $Quot25JPaintedPanel = new Quot25JPaintedPanel();
                $Quot25JPaintedPanel->quotation_id = $Quotation_Id;
                $Quot25JPaintedPanel->sku = $Sku;
                $Quot25JPaintedPanel->amount = $Amount;
                $Quot25JPaintedPanel->caliber = $Caliber;
                $Quot25JPaintedPanel->frame_background = $FrameBackgrounds;
                $Quot25JPaintedPanel->length_dimension = $LengthDimension;
                $Quot25JPaintedPanel->weight = $Weight;
                $Quot25JPaintedPanel->total_weight = $TotalWeight;
                $Quot25JPaintedPanel->m2 = $M2;
                $Quot25JPaintedPanel->price_unit = $PriceUnit;
                $Quot25JPaintedPanel->total_price = $TotalPrice;
                $Quot25JPaintedPanel->save();
            }

            return view('quotes.selectivo.panels.two_point_five_in_joist_l_painted_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('selectivo_two_point_five_in_joist_l_painted_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function selectivo_chair_joist_galvanized_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $ChairJoistGalvanizedPanel = ChairJoistGalvanizedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($ChairJoistGalvanizedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Galvanizada')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $ChairJoistGalvanizedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $ChairJoistGalvanizedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $ChairJoistGalvanizedPanel->sku;
            $M2 = $ChairJoistGalvanizedPanel->m2;

            $QuotChairJGalvanizedPanel = QuotChairJGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();

            if($QuotChairJGalvanizedPanel)
            {
                $QuotChairJGalvanizedPanel->sku = $Sku;
                $QuotChairJGalvanizedPanel->amount = $Amount;
                $QuotChairJGalvanizedPanel->caliber = $Caliber;
                $QuotChairJGalvanizedPanel->frame_background = $FrameBackgrounds;
                $QuotChairJGalvanizedPanel->length_dimension = $LengthDimension;
                $QuotChairJGalvanizedPanel->weight = $Weight;
                $QuotChairJGalvanizedPanel->total_weight = $TotalWeight;
                $QuotChairJGalvanizedPanel->m2 = $M2;
                $QuotChairJGalvanizedPanel->price_unit = $PriceUnit;
                $QuotChairJGalvanizedPanel->total_price = $TotalPrice;
                $QuotChairJGalvanizedPanel->save();
            }else{
                $QuotChairJGalvanizedPanel = new QuotChairJGalvanizedPanel();
                $QuotChairJGalvanizedPanel->quotation_id = $Quotation_Id;
                $QuotChairJGalvanizedPanel->sku = $Sku;
                $QuotChairJGalvanizedPanel->amount = $Amount;
                $QuotChairJGalvanizedPanel->caliber = $Caliber;
                $QuotChairJGalvanizedPanel->frame_background = $FrameBackgrounds;
                $QuotChairJGalvanizedPanel->length_dimension = $LengthDimension;
                $QuotChairJGalvanizedPanel->weight = $Weight;
                $QuotChairJGalvanizedPanel->total_weight = $TotalWeight;
                $QuotChairJGalvanizedPanel->m2 = $M2;
                $QuotChairJGalvanizedPanel->price_unit = $PriceUnit;
                $QuotChairJGalvanizedPanel->total_price = $TotalPrice;
                $QuotChairJGalvanizedPanel->save();
            }

            return view('quotes.selectivo.panels.chair_joist_galvanized_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('selectivo_chair_joist_galvanized_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function selectivo_chair_joist_l_painted_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $ChairJoistLPaintedPanel = ChairJoistLPaintedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($ChairJoistLPaintedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Negra')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $ChairJoistLPaintedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $ChairJoistLPaintedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $ChairJoistLPaintedPanel->sku;
            $M2 = $ChairJoistLPaintedPanel->m2;

            $QuotChairJPaintedPanel = QuotChairJPaintedPanel::where('quotation_id', $Quotation_Id)->first();

            if($QuotChairJPaintedPanel)
            {
                $QuotChairJPaintedPanel->sku = $Sku;
                $QuotChairJPaintedPanel->amount = $Amount;
                $QuotChairJPaintedPanel->caliber = $Caliber;
                $QuotChairJPaintedPanel->frame_background = $FrameBackgrounds;
                $QuotChairJPaintedPanel->length_dimension = $LengthDimension;
                $QuotChairJPaintedPanel->weight = $Weight;
                $QuotChairJPaintedPanel->total_weight = $TotalWeight;
                $QuotChairJPaintedPanel->m2 = $M2;
                $QuotChairJPaintedPanel->price_unit = $PriceUnit;
                $QuotChairJPaintedPanel->total_price = $TotalPrice;
                $QuotChairJPaintedPanel->save();
            }else{
                $QuotChairJPaintedPanel = new QuotChairJPaintedPanel();
                $QuotChairJPaintedPanel->quotation_id = $Quotation_Id;
                $QuotChairJPaintedPanel->sku = $Sku;
                $QuotChairJPaintedPanel->amount = $Amount;
                $QuotChairJPaintedPanel->caliber = $Caliber;
                $QuotChairJPaintedPanel->frame_background = $FrameBackgrounds;
                $QuotChairJPaintedPanel->length_dimension = $LengthDimension;
                $QuotChairJPaintedPanel->weight = $Weight;
                $QuotChairJPaintedPanel->total_weight = $TotalWeight;
                $QuotChairJPaintedPanel->m2 = $M2;
                $QuotChairJPaintedPanel->price_unit = $PriceUnit;
                $QuotChairJPaintedPanel->total_price = $TotalPrice;
                $QuotChairJPaintedPanel->save();
            }

            return view('quotes.selectivo.panels.chair_joist_l_painted_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('selectivo_chair_joist_l_painted_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function selectivo_protectors_store(Request $request)
    {
        return $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;


    }

    public function selectivo_pair_bars_protectors_store(Request $request)
    {
        return $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;


    }


    /* Double Deep */

    public function double_deep_panels($id)
    {
        $Quotation_Id = $id;

        return view('quotes.double_deep.panels.index', compact(
            'Quotation_Id',
        ));
    }

    public function double_deep_two_in_joist_l_galvanized_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = TwoInJoistLGalvanizedPanel::distinct()->get('caliber');
        $FrameBackgrounds = TwoInJoistLGalvanizedPanel::distinct()->get('frame_background');
        $LengthDimensions = TwoInJoistLGalvanizedPanel::distinct()->get('length_dimension');
        
        return view('quotes.double_deep.panels.two_in_joist_l_galvanized_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function double_deep_two_in_joist_l_painted_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = TwoInJoistLPaintedPanel::distinct()->get('caliber');
        $FrameBackgrounds = TwoInJoistLPaintedPanel::distinct()->get('frame_background');
        $LengthDimensions = TwoInJoistLPaintedPanel::distinct()->get('length_dimension');
        
        return view('quotes.double_deep.panels.two_in_joist_l_painted_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function double_deep_two_point_five_in_joist_l_galvanized_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = TwoPointFiveInJoistLGalvanizedPanel::distinct()->get('caliber');
        $FrameBackgrounds = TwoPointFiveInJoistLGalvanizedPanel::distinct()->get('frame_background');
        $LengthDimensions = TwoPointFiveInJoistLGalvanizedPanel::distinct()->get('length_dimension');
        
        return view('quotes.double_deep.panels.two_point_five_in_joist_l_galvanized_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function double_deep_two_point_five_in_joist_l_painted_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = TwoPointFiveInJoistLPaintedPanel::distinct()->get('caliber');
        $FrameBackgrounds = TwoPointFiveInJoistLPaintedPanel::distinct()->get('frame_background');
        $LengthDimensions = TwoPointFiveInJoistLPaintedPanel::distinct()->get('length_dimension');
        
        return view('quotes.double_deep.panels.two_point_five_in_joist_l_painted_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function double_deep_chair_joist_galvanized_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = ChairJoistGalvanizedPanel::distinct()->get('caliber');
        $FrameBackgrounds = ChairJoistGalvanizedPanel::distinct()->get('frame_background');
        $LengthDimensions = ChairJoistGalvanizedPanel::distinct()->get('length_dimension');
        
        return view('quotes.double_deep.panels.chair_joist_galvanized_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }

    public function double_deep_chair_joist_l_painted_panels($id)
    {
        $Quotation_Id = $id;
        $Calibers = ChairJoistLPaintedPanel::distinct()->get('caliber');
        $FrameBackgrounds = ChairJoistLPaintedPanel::distinct()->get('frame_background');
        $LengthDimensions = ChairJoistLPaintedPanel::distinct()->get('length_dimension');
        
        return view('quotes.double_deep.panels.chair_joist_l_painted_panels.index', compact(
            'Quotation_Id',
            'Calibers',
            'FrameBackgrounds',
            'LengthDimensions',
        ));
    }



    public function double_deep_two_in_joist_l_galvanized_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $TwoInJoistLGalvanizedPanel = TwoInJoistLGalvanizedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($TwoInJoistLGalvanizedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Galvanizada')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $TwoInJoistLGalvanizedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $TwoInJoistLGalvanizedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $TwoInJoistLGalvanizedPanel->sku;
            $M2 = $TwoInJoistLGalvanizedPanel->m2;

            $Quot2JGalvanizedPanel = Quot2JGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();

            if($Quot2JGalvanizedPanel)
            {
                $Quot2JGalvanizedPanel->sku = $Sku;
                $Quot2JGalvanizedPanel->amount = $Amount;
                $Quot2JGalvanizedPanel->caliber = $Caliber;
                $Quot2JGalvanizedPanel->frame_background = $FrameBackgrounds;
                $Quot2JGalvanizedPanel->length_dimension = $LengthDimension;
                $Quot2JGalvanizedPanel->weight = $Weight;
                $Quot2JGalvanizedPanel->total_weight = $TotalWeight;
                $Quot2JGalvanizedPanel->m2 = $M2;
                $Quot2JGalvanizedPanel->price_unit = $PriceUnit;
                $Quot2JGalvanizedPanel->total_price = $TotalPrice;
                $Quot2JGalvanizedPanel->save();
            }else{
                $Quot2JGalvanizedPanel = new Quot2JGalvanizedPanel();
                $Quot2JGalvanizedPanel->quotation_id = $Quotation_Id;
                $Quot2JGalvanizedPanel->sku = $Sku;
                $Quot2JGalvanizedPanel->amount = $Amount;
                $Quot2JGalvanizedPanel->caliber = $Caliber;
                $Quot2JGalvanizedPanel->frame_background = $FrameBackgrounds;
                $Quot2JGalvanizedPanel->length_dimension = $LengthDimension;
                $Quot2JGalvanizedPanel->weight = $Weight;
                $Quot2JGalvanizedPanel->total_weight = $TotalWeight;
                $Quot2JGalvanizedPanel->m2 = $M2;
                $Quot2JGalvanizedPanel->price_unit = $PriceUnit;
                $Quot2JGalvanizedPanel->total_price = $TotalPrice;
                $Quot2JGalvanizedPanel->save();
            }

            return view('quotes.double_deep.panels.two_in_joist_l_galvanized_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('double_deep_two_in_joist_l_galvanized_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function double_deep_two_in_joist_l_painted_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $TwoInJoistLPaintedPanel = TwoInJoistLPaintedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($TwoInJoistLPaintedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Negra')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $TwoInJoistLPaintedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $TwoInJoistLPaintedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $TwoInJoistLPaintedPanel->sku;
            $M2 = $TwoInJoistLPaintedPanel->m2;

            $Quot2JPaintedPanel = Quot2JPaintedPanel::where('quotation_id', $Quotation_Id)->first();

            if($Quot2JPaintedPanel)
            {
                $Quot2JPaintedPanel->sku = $Sku;
                $Quot2JPaintedPanel->amount = $Amount;
                $Quot2JPaintedPanel->caliber = $Caliber;
                $Quot2JPaintedPanel->frame_background = $FrameBackgrounds;
                $Quot2JPaintedPanel->length_dimension = $LengthDimension;
                $Quot2JPaintedPanel->weight = $Weight;
                $Quot2JPaintedPanel->total_weight = $TotalWeight;
                $Quot2JPaintedPanel->m2 = $M2;
                $Quot2JPaintedPanel->price_unit = $PriceUnit;
                $Quot2JPaintedPanel->total_price = $TotalPrice;
                $Quot2JPaintedPanel->save();
            }else{
                $Quot2JPaintedPanel = new Quot2JPaintedPanel();
                $Quot2JPaintedPanel->quotation_id = $Quotation_Id;
                $Quot2JPaintedPanel->sku = $Sku;
                $Quot2JPaintedPanel->amount = $Amount;
                $Quot2JPaintedPanel->caliber = $Caliber;
                $Quot2JPaintedPanel->frame_background = $FrameBackgrounds;
                $Quot2JPaintedPanel->length_dimension = $LengthDimension;
                $Quot2JPaintedPanel->weight = $Weight;
                $Quot2JPaintedPanel->total_weight = $TotalWeight;
                $Quot2JPaintedPanel->m2 = $M2;
                $Quot2JPaintedPanel->price_unit = $PriceUnit;
                $Quot2JPaintedPanel->total_price = $TotalPrice;
                $Quot2JPaintedPanel->save();
            }

            return view('quotes.double_deep.panels.two_in_joist_l_painted_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('double_deep_two_in_joist_l_painted_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function double_deep_two_point_five_in_joist_l_galvanized_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $TwoPointFiveInJoistLGalvanizedPanel = TwoPointFiveInJoistLGalvanizedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($TwoPointFiveInJoistLGalvanizedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Galvanizada')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $TwoPointFiveInJoistLGalvanizedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $TwoPointFiveInJoistLGalvanizedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $TwoPointFiveInJoistLGalvanizedPanel->sku;
            $M2 = $TwoPointFiveInJoistLGalvanizedPanel->m2;

            $Quot25JGalvanizedPanel = Quot25JGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();

            if($Quot25JGalvanizedPanel)
            {
                $Quot25JGalvanizedPanel->sku = $Sku;
                $Quot25JGalvanizedPanel->amount = $Amount;
                $Quot25JGalvanizedPanel->caliber = $Caliber;
                $Quot25JGalvanizedPanel->frame_background = $FrameBackgrounds;
                $Quot25JGalvanizedPanel->length_dimension = $LengthDimension;
                $Quot25JGalvanizedPanel->weight = $Weight;
                $Quot25JGalvanizedPanel->total_weight = $TotalWeight;
                $Quot25JGalvanizedPanel->m2 = $M2;
                $Quot25JGalvanizedPanel->price_unit = $PriceUnit;
                $Quot25JGalvanizedPanel->total_price = $TotalPrice;
                $Quot25JGalvanizedPanel->save();
            }else{
                $Quot25JGalvanizedPanel = new Quot25JGalvanizedPanel();
                $Quot25JGalvanizedPanel->quotation_id = $Quotation_Id;
                $Quot25JGalvanizedPanel->sku = $Sku;
                $Quot25JGalvanizedPanel->amount = $Amount;
                $Quot25JGalvanizedPanel->caliber = $Caliber;
                $Quot25JGalvanizedPanel->frame_background = $FrameBackgrounds;
                $Quot25JGalvanizedPanel->length_dimension = $LengthDimension;
                $Quot25JGalvanizedPanel->weight = $Weight;
                $Quot25JGalvanizedPanel->total_weight = $TotalWeight;
                $Quot25JGalvanizedPanel->m2 = $M2;
                $Quot25JGalvanizedPanel->price_unit = $PriceUnit;
                $Quot25JGalvanizedPanel->total_price = $TotalPrice;
                $Quot25JGalvanizedPanel->save();
            }

            return view('quotes.double_deep.panels.two_point_five_in_joist_l_galvanized_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('double_deep_two_point_five_in_joist_l_galvanized_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function double_deep_two_point_five_in_joist_l_painted_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $TwoPointFiveInJoistLPaintedPanel = TwoPointFiveInJoistLPaintedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($TwoPointFiveInJoistLPaintedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Negra')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $TwoPointFiveInJoistLPaintedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $TwoPointFiveInJoistLPaintedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $TwoPointFiveInJoistLPaintedPanel->sku;
            $M2 = $TwoPointFiveInJoistLPaintedPanel->m2;

            $Quot25JPaintedPanel = Quot25JPaintedPanel::where('quotation_id', $Quotation_Id)->first();

            if($Quot25JPaintedPanel)
            {
                $Quot25JPaintedPanel->sku = $Sku;
                $Quot25JPaintedPanel->amount = $Amount;
                $Quot25JPaintedPanel->caliber = $Caliber;
                $Quot25JPaintedPanel->frame_background = $FrameBackgrounds;
                $Quot25JPaintedPanel->length_dimension = $LengthDimension;
                $Quot25JPaintedPanel->weight = $Weight;
                $Quot25JPaintedPanel->total_weight = $TotalWeight;
                $Quot25JPaintedPanel->m2 = $M2;
                $Quot25JPaintedPanel->price_unit = $PriceUnit;
                $Quot25JPaintedPanel->total_price = $TotalPrice;
                $Quot25JPaintedPanel->save();
            }else{
                $Quot25JPaintedPanel = new Quot25JPaintedPanel();
                $Quot25JPaintedPanel->quotation_id = $Quotation_Id;
                $Quot25JPaintedPanel->sku = $Sku;
                $Quot25JPaintedPanel->amount = $Amount;
                $Quot25JPaintedPanel->caliber = $Caliber;
                $Quot25JPaintedPanel->frame_background = $FrameBackgrounds;
                $Quot25JPaintedPanel->length_dimension = $LengthDimension;
                $Quot25JPaintedPanel->weight = $Weight;
                $Quot25JPaintedPanel->total_weight = $TotalWeight;
                $Quot25JPaintedPanel->m2 = $M2;
                $Quot25JPaintedPanel->price_unit = $PriceUnit;
                $Quot25JPaintedPanel->total_price = $TotalPrice;
                $Quot25JPaintedPanel->save();
            }

            return view('quotes.double_deep.panels.two_point_five_in_joist_l_painted_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('double_deep_two_point_five_in_joist_l_painted_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function double_deep_chair_joist_galvanized_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $ChairJoistGalvanizedPanel = ChairJoistGalvanizedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($ChairJoistGalvanizedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Galvanizada')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $ChairJoistGalvanizedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $ChairJoistGalvanizedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $ChairJoistGalvanizedPanel->sku;
            $M2 = $ChairJoistGalvanizedPanel->m2;

            $QuotChairJGalvanizedPanel = QuotChairJGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();

            if($QuotChairJGalvanizedPanel)
            {
                $QuotChairJGalvanizedPanel->sku = $Sku;
                $QuotChairJGalvanizedPanel->amount = $Amount;
                $QuotChairJGalvanizedPanel->caliber = $Caliber;
                $QuotChairJGalvanizedPanel->frame_background = $FrameBackgrounds;
                $QuotChairJGalvanizedPanel->length_dimension = $LengthDimension;
                $QuotChairJGalvanizedPanel->weight = $Weight;
                $QuotChairJGalvanizedPanel->total_weight = $TotalWeight;
                $QuotChairJGalvanizedPanel->m2 = $M2;
                $QuotChairJGalvanizedPanel->price_unit = $PriceUnit;
                $QuotChairJGalvanizedPanel->total_price = $TotalPrice;
                $QuotChairJGalvanizedPanel->save();
            }else{
                $QuotChairJGalvanizedPanel = new QuotChairJGalvanizedPanel();
                $QuotChairJGalvanizedPanel->quotation_id = $Quotation_Id;
                $QuotChairJGalvanizedPanel->sku = $Sku;
                $QuotChairJGalvanizedPanel->amount = $Amount;
                $QuotChairJGalvanizedPanel->caliber = $Caliber;
                $QuotChairJGalvanizedPanel->frame_background = $FrameBackgrounds;
                $QuotChairJGalvanizedPanel->length_dimension = $LengthDimension;
                $QuotChairJGalvanizedPanel->weight = $Weight;
                $QuotChairJGalvanizedPanel->total_weight = $TotalWeight;
                $QuotChairJGalvanizedPanel->m2 = $M2;
                $QuotChairJGalvanizedPanel->price_unit = $PriceUnit;
                $QuotChairJGalvanizedPanel->total_price = $TotalPrice;
                $QuotChairJGalvanizedPanel->save();
            }

            return view('quotes.double_deep.panels.chair_joist_galvanized_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('double_deep_chair_joist_galvanized_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function double_deep_chair_joist_l_painted_panels_store(Request $request)
    {
        $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;

        $ChairJoistLPaintedPanel = ChairJoistLPaintedPanel::where('caliber', $Caliber)->where('frame_background', $FrameBackgrounds)->where('length_dimension', $LengthDimension)->first();
        if($ChairJoistLPaintedPanel){
            $PriceLists = PriceList::where('piece', 'PANELES')->where('caliber', $Caliber)->where('type','Negra')->first();
            $F_Total = $PriceLists->f_total;
            $F_Vta = $PriceLists->f_vta;
            $F_Desp = $PriceLists->f_desp;
            $F_Emb = $PriceLists->f_emb;
            $F_Desc =$PriceLists->f_desc;
            $Price = $ChairJoistLPaintedPanel->import;
            // $PriceUnit = $Price * $F_Total;
            $PriceUnit = ($Price * $F_Vta * $F_Desp * $F_Emb) / $F_Desc;
            $TotalPrice = $Amount * $PriceUnit;
            $Weight = $ChairJoistLPaintedPanel->weight;
            $TotalWeight = $Amount * $Weight;
            $Sku = $ChairJoistLPaintedPanel->sku;
            $M2 = $ChairJoistLPaintedPanel->m2;

            $QuotChairJPaintedPanel = QuotChairJPaintedPanel::where('quotation_id', $Quotation_Id)->first();

            if($QuotChairJPaintedPanel)
            {
                $QuotChairJPaintedPanel->sku = $Sku;
                $QuotChairJPaintedPanel->amount = $Amount;
                $QuotChairJPaintedPanel->caliber = $Caliber;
                $QuotChairJPaintedPanel->frame_background = $FrameBackgrounds;
                $QuotChairJPaintedPanel->length_dimension = $LengthDimension;
                $QuotChairJPaintedPanel->weight = $Weight;
                $QuotChairJPaintedPanel->total_weight = $TotalWeight;
                $QuotChairJPaintedPanel->m2 = $M2;
                $QuotChairJPaintedPanel->price_unit = $PriceUnit;
                $QuotChairJPaintedPanel->total_price = $TotalPrice;
                $QuotChairJPaintedPanel->save();
            }else{
                $QuotChairJPaintedPanel = new QuotChairJPaintedPanel();
                $QuotChairJPaintedPanel->quotation_id = $Quotation_Id;
                $QuotChairJPaintedPanel->sku = $Sku;
                $QuotChairJPaintedPanel->amount = $Amount;
                $QuotChairJPaintedPanel->caliber = $Caliber;
                $QuotChairJPaintedPanel->frame_background = $FrameBackgrounds;
                $QuotChairJPaintedPanel->length_dimension = $LengthDimension;
                $QuotChairJPaintedPanel->weight = $Weight;
                $QuotChairJPaintedPanel->total_weight = $TotalWeight;
                $QuotChairJPaintedPanel->m2 = $M2;
                $QuotChairJPaintedPanel->price_unit = $PriceUnit;
                $QuotChairJPaintedPanel->total_price = $TotalPrice;
                $QuotChairJPaintedPanel->save();
            }

            return view('quotes.double_deep.panels.chair_joist_l_painted_panels.store', compact(
                'Quotation_Id',
                'Amount',
                'Caliber',
                'FrameBackgrounds',
                'LengthDimension',
                'PriceUnit',
                'TotalPrice',
                'Weight',
                'TotalWeight',
                'Sku',
                'M2',
            ));
        }else{
            return redirect()->route('double_deep_chair_joist_l_painted_panels',$Quotation_Id)->with('no_existe', 'ok');
        }

    }

    public function double_deep_protectors_store(Request $request)
    {
        return $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;


    }

    public function double_deep_pair_bars_protectors_store(Request $request)
    {
        return $request;
        $rules = [
            'amount' => 'required',
            'caliber' => 'required',
            'frame_background' => 'required',
            'length_dimension' => 'required',
        ];

        $messages = [
            'amount.required' => 'Capture la Cantidad',
            'caliber.required' => 'Seleccione el calibre',
            'frame_background.required' => 'Seleccione el Fondo',
            'length_dimension.required' => 'Seleccione el Largo',
        ];

        $request->validate($rules,$messages);

        $Quotation_Id = $request->Quotation_Id;
        $Amount = $request->amount;
        $Caliber = $request->caliber;
        $FrameBackgrounds = $request->frame_background;
        $LengthDimension = $request->length_dimension;
    }


    /* Resources */

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


    public function selectivo_two_in_joist_l_galvanized_panels_add($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','PG2')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = Quot2JGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='PANEL GALVANIZADO VIGA L 2 IN'.$SJL2->model;
        $Cart_product->type='PG2';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo_panels',$Quotation_Id);
    }

    public function selectivo_two_in_joist_l_painted_panels_add($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','PP2')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = Quot2JPaintedPanel::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='PANEL PINTADO VIGA L 2 IN'.$SJL2->model;
        $Cart_product->type='PP2';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo_panels',$Quotation_Id);
    }

    public function selectivo_two_point_five_in_joist_l_galvanized_panels_add($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','PG25')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = Quot25JGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='PANEL GALVANIZADO VIGA L 2.5 IN'.$SJL2->model;
        $Cart_product->type='PG25';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo_panels',$Quotation_Id);
    }

    public function selectivo_two_point_five_in_joist_l_painted_panels_add($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','PP25')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = Quot25PaintedPanel::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='PANEL PINTADO VIGA L 2.5 IN'.$SJL2->model;
        $Cart_product->type='PP25';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo_panels',$Quotation_Id);
    }

    public function selectivo_chair_joist_galvanized_panels_add($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','PGC')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = QuotChairJGalvanizedPanel::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='PANEL GALVANIZADO VIGA SILLA'.$SJL2->model;
        $Cart_product->type='PGC';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo_panels',$Quotation_Id);
    }

    public function selectivo_chair_joist_l_painted_panels_add($id)
    {
        $Quotation_Id = $id;
        $Quotation=Quotation::find($id);
        //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
        $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','PPC')->first();
        if($cartl2){
            Cart_product::destroy($cartl2->id);
        }
        //agregar el nuevo al carrito, lo que este en 
        $SJL2 = QuotChairJPaintedPanel::where('quotation_id', $Quotation_Id)->first();
        //guardar en el carrito
        $Cart_product= new Cart_product();
        $Cart_product->name='PANEL PINTADO VIGA SILLA'.$SJL2->model;
        $Cart_product->type='PPC';
        $Cart_product->unit_price=$SJL2->price_unit;
        $Cart_product->total_price=$SJL2->total_price;
        $Cart_product->quotation_id=$Quotation_Id;
        $Cart_product->user_id=Auth::user()->id;
        $Cart_product->amount=$SJL2->amount;
        $Cart_product->save();
        
        return redirect()->route('selectivo_panels',$Quotation_Id);
    }

}
