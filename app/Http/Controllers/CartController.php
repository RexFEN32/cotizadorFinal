<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuotationProtector;
use App\Models\Quotation;
use App\Models\Cart_product;
use App\Models\SelectiveHeavyLoadFrame;
use App\Models\SelectiveStructuralFrame;
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
    $cartl2 = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SPR')->get();
        if($cartl2->count()>0){
            foreach($cartl2 as $c){
                Cart_product::destroy($c->id);
            }
            
        }
    $QuotationProtectors = QuotationProtector::where('quotation_id', $Quotation_Id)->get();
    if(count($QuotationProtectors)>0){
        foreach($QuotationProtectors as $protector){
            $product=new Cart_product();
            $product->user_id=$Quotation->user_id;
            $product->name=$protector->protector;
            $product->unit_price=$protector->unit_price;
            $product->amount=$protector->amount;
            $porduct->type='SPR';
            $product->total_price=$protector->total_price;
            $product->quotation_id=$Quotation_Id;
            $product->save();
        }
    }
    return redirect()->route('selectivo_protectors.index',$Quotation_Id);
}
public function add_selectivo_carga_pesada($id){
    $Quotation_Id = $id;
    $Quotation=Quotation::find($id);
    //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
    $cartSHLF = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SHLF')->first();
    if($cartSHLF){
        Cart_product::destroy($cartSHLF->id);
    }
    //agregar el nuevo al carrito, lo que este en 
    $SHLF = SelectiveHeavyLoadFrame::where('quotation_id', $Quotation_Id)->first();
    //guardar en el carrito
    $Cart_product= new Cart_product();
    $Cart_product->name='MARCO SELECTIVO CARGA PESADA '.$SHLF->model;
    $Cart_product->type='SHLF';
    $Cart_product->unit_price=$SHLF->total_price;
    $Cart_product->total_price=$SHLF->total_price;
    $Cart_product->quotation_id=$Quotation_Id;
    $Cart_product->user_id=Auth::user()->id;
    $Cart_product->amount=1;
    $Cart_product->save();
    
    return redirect()->route('menuframes.show',$Quotation_Id);
}

public function add_selectivo_marcos_estructurales($id){
    $Quotation_Id = $id;
    $Quotation=Quotation::find($id);
    //buscar si en el carrito hay otro SHLF de esta cotizacion y borrarlo
    $cartSHLF = Cart_product::where('quotation_id', $Quotation_Id)->where('type','SF')->first();
    if($cartSHLF){
        Cart_product::destroy($cartSHLF->id);
    }
    //agregar el nuevo al carrito, lo que este en 
    $SF = SelectiveStructuralFrame::where('quotation_id', $Quotation_Id)->first();
    //guardar en el carrito
    $Cart_product= new Cart_product();
    $Cart_product->name='MARCO SELECTIVO ESTRUCTURAL  '.$SF->model;
    $Cart_product->type='SF';
    $Cart_product->unit_price=$SF->total_price;
    $Cart_product->total_price=$SF->total_price;
    $Cart_product->quotation_id=$Quotation_Id;
    $Cart_product->user_id=Auth::user()->id;
    $Cart_product->amount=1;
    $Cart_product->save();
    
    return redirect()->route('menuframes.show',$Quotation_Id);
}

public function destroy($id){
 Cart_product::destroy($id);
 return redirect()->route('shopping_cart.index');
}

public function vaciar(){
    $productos=Cart_product::where('user_id',Auth::user()->id)->get();
    foreach($productos as $p){
        Cart_product::destroy($p->id);
    
    }
    
    return redirect()->route('shopping_cart.index');
   }
   
}
