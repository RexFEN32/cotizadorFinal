<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoubleDeepMenuJoistController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        return view('quotes.double_deep.joists.index', compact('Quotation_Id'));
    }
}
