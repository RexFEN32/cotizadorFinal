<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorepaymentsRequest;
use App\Http\Requests\UpdatepaymentsRequest;
use SplFileInfo;
use Illuminate\Support\Facades\Storage;
use DB;
use PDF;
use Symfony\Component\Process\Process; 
use Symfony\Component\Process\Exception\ProcessFailedException; 
use Illuminate\Support\Facades\Auth;

use App\Models\Quotation;

class ReportsController extends Controller
{
    public function index(){
        
        $Quotations = Quotation::all();
        return view('reports.index',compact('Quotations'));
    }



    public function generate($id,$report,$pdf,$tipo=0)
    {
        $caminoalpoder=public_path();
        $process = new Process(['python',$caminoalpoder.'/'.$report.'.py',$id,$tipo]);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $data = $process->getOutput();
        if($pdf==0){
            return response()->download(public_path('storage/report/'.$report.$id.'.xlsx'));
        }else{
         //shell_exec('cd'.$caminoalpoder.'/storage/report/;'.' localc --headless --convert-to pdf '.$report.$id.'.xlsx');
          $process2=new Process(['localc','--headless','--convert-to', 'pdf', $report.$id.'.xlsx'],$caminoalpoder.'/storage/report/');
         //$process=new Process(['localc','--headless','--convert-to','pdf','--outdir',$caminoalpoder.'/storage/report/',$report.$id.'.xlsx'],$caminoalpoder.'/storage/report/');
         //$process2 = new Process(["soffice", "--convert-to","pdf:calc_pdf_Export:{\"SinglePageSheets\":{\"type\":\"boolean\",\"value\":\"true\"}}",$report.$id.".xlsx "],$caminoalpoder.'/storage/report/');
         // $process2->setTimeout(null);
         // $process2->setIdleTimeout(null);
          $process2->run();
          if (!$process2->isSuccessful()) {
             throw new ProcessFailedException($process2);
          }
          $data = $process2->getOutput();
         return response()->download(public_path('storage/report/'.$report.$id.'.pdf'));
     
     
    }}
}
