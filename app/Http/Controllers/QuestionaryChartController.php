<?php

namespace App\Http\Controllers;

use App\Models\QuestionaryChart;
use Illuminate\Http\Request;

class QuestionaryChartController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'description' => 'required',
            'amount' => 'required',
            'dimensions' => 'required',
            'caliber' => 'required',
            'color' => 'required',
            'galv' => 'required',
            'colorless' => 'required',
        ];

        $messages = [
            'description.required' => 'Capture la Descripción',
            'amount.required' => 'Capture la cantidad',
            'dimensions.required' => 'Capture las dimensiones',
            'caliber.required' => 'Capture el Calibre',
            'color.required' => 'Capture el Color',
            'galv.required' => 'Capture el Galv',
            'colorless.required' => 'Capture Sin Color',
        ];

        $request->validate($rules, $messages);

        $QuestionaryChart = QuestionaryChart::where('quotation_id', $request->quotation_id)->orderBy('id', 'DESC')->first();
        if($QuestionaryChart){
            $Item = $QuestionaryChart->item + 1;
        }else{
            $Item = '1';
        }

        $QuestionaryCharts = new QuestionaryChart();
        $QuestionaryCharts->quotation_id = $request->quotation_id;
        $QuestionaryCharts->item = $Item;
        $QuestionaryCharts->description = $request->description;
        $QuestionaryCharts->amount = $request->amount;
        $QuestionaryCharts->dimensions = $request->dimensions;
        $QuestionaryCharts->caliber = $request->caliber;
        $QuestionaryCharts->color = $request->color;
        $QuestionaryCharts->galv = $request->galv;
        $QuestionaryCharts->colorless = $request->colorless;
        $QuestionaryCharts->save();

        return redirect()->route('return_material_list', $request->quotation_id)->with('create_reg', 'ok');
    }

    public function show($id)
    {
        $Quotation_Id = $id;

        return view('quotes.questionarychart', compact('Quotation_Id'));
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
