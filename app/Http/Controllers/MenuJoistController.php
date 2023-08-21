<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuJoistController extends Controller
{
    public function show($id)
    {
        $Quotation_Id = $id;
        return view('quotes.selectivo.joists.index', compact('Quotation_Id'));
    }
}
