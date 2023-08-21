<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoubleDeepMenuFrameController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        return view('quotes.double_deep.frames.index', compact('Quotation_Id'));
    }
}
