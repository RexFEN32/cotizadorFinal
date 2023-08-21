<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class SelectivoController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $Quotations = Quotation::find($id);
        $Quotations->type = "SELECTIVO";
        $Quotations->save();

        return view('quotes.selectivo.index', compact('Quotation_Id'));
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
