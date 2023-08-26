<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuotationProtector;
use App\Models\Quotation;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function index(){
    $Quotation = Quotation::where('user_id','=',Auth::user()->id)->orderBy('created_at', 'desc')->first();;
   
    $Protectors=QuotationProtector::where('quotation_id','=',$Quotation->id)->get();
   
    return view('quotes.cart.index',compact('Protectors'));
   }
   public function update(){
    $Quotation = Quotation::where('user_id','=',Auth::user()->id)->orderBy('created_at', 'desc')->first();;
    $Protectors=QuotationProtector::where('quotation_id','=',$Quotation->id)->get();
   
    return [
        'label'       => count($Protectors),
        'label_color' => 'danger',
        'icon' => 'fas fa-shopping-cart',
        
    ];
   }
}
