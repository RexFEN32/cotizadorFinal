<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class DoubleDeepController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        $Quotations = Quotation::find($id);
        $Quotations->type = "DOBLE PROFUNDIDAD";
        $Quotations->save();

        return view('quotes.double_deep.index', compact('Quotation_Id'));
    }
}
