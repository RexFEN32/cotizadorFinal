<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuotationProtector;
use App\Models\Quotation;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function index(){
    $user_id=Auth::user()->id;
    $Quotation = Quotation::where('user_id','=',$user_id)->orderBy('created_at', 'desc')->first();;
    $Cart_products=Cart_product::where('user_id',$user_id)->get();
    return view('quotes.cart.index',compact('Cart_products'));
   }
   public function update(){
    $user_id=Auth::user()->id;
    $Quotation = Quotation::where('user_id','=',$user_id)->orderBy('created_at', 'desc')->first();;
    $Cart_products=Cart_product::where('user_id',$user_id)->get();
    
    return [
        'label'       => count($Cart_products),
        'label_color' => 'danger',
        'icon' => 'fas fa-shopping-cart',
        
    ];
   }

   public function add($user_id,$name,$unit_price,$amount,$quotation_id){
       $product=new Cart_product();
       $product->user_id=$user_id;
       $product->name=$name;
       $product->unit_price=$unit_price;
       $product->amount=$amount;
       $product->total_price=$unit_price * $amount;
       $product->quotation_id=$quotation_id;
       $product->save();
   }
   public function add_selectivo_protectors($id){
    $Quotation_Id = $id;
    $Quotation=Quotation::find($id);
    $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->get();
    if(count($QuotationProtectors)>0){
        foreach($QuotationProtectors as $protector){
            $product=new Cart_product();
            $product->user_id=$Quotation->user_id;
            $product->name=$protector->protector;
            $product->unit_price=$protector->unit_price;
            $product->amount=$protector->amount;
            $product->total_price=$protector->total_price;
            $product->quotation_id=$Quotation_Id;
            $product->save();
        }
    }
    return redirect()->route('selectivo_protectors.index',$Quotation_Id);
}
}
