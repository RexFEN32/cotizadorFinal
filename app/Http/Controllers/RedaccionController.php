<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedaccionController extends Controller
{
    public function generate($QuotationId)
    {
        $caminoalpoder=public_path();
        $process = new Process(['python3', 'redaccion.py',$QuotationId],$caminoalpoder);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $data = $process->getOutput();
        
            return response()->download(public_path('Cotizacion'.$QuotationId.'.docx'));
       
    }
}
