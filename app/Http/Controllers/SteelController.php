<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\PriceFrame;
use App\Models\PriceList;
use App\Models\PriceListBar;
use App\Models\PriceListProtector;
use App\Models\PriceMiniatureFrame;
use App\Models\PriceStructuralFrameworks;
use App\Models\Steel;
use App\Models\TypeBox25Joist;
use App\Models\TypeBox2Joist;
use App\Models\TypeC2Joist;
use App\Models\TypeChairJoist;
use App\Models\TypeL25Joist;
use App\Models\TypeL2Joist;
use App\Models\TypeLJoist;
use App\Models\TypeLRJoist;
use App\Models\TypeStructuralJoist;
use Illuminate\Http\Request;

class SteelController extends Controller
{
    public function index()
    {
        $Steels = Steel::all();
        return view('admin.steels.index', compact('Steels'));
    }

    public function create()
    {
        return view('admin.steels.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'caliber' => 'required',
            'type' => 'required',
            'cost' => 'required',
        ];

        $messages = [
            'caliber.required' => 'Escriba el Calibre del Acero',
            'type.required' => 'Escriba el tipo de acero',
            'cost.required' => 'Capture el Costo',
        ];

        $request->validate($rules, $messages);

        $Steels = new Steel();
        $Steels->caliber = $request->caliber;
        $Steels->type = $request->type;
        $Steels->cost = $request->cost;
        $Steels->save();

        $ListPrices = PriceList::where('caliber', $Steels->caliber)->where('type', $Steels->type)->first();
        if($ListPrices){
            $ListPrices->cost = $Steels->cost;
            $ListPrices->save();
        }

        $PriceFrames = PriceFrame::where('caliber', $Steels->caliber)->get();
        if($PriceFrames->count() > 0){
            foreach($PriceFrames as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'MARCO')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->total_kg * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $PriceMiniatureFrames = PriceMiniatureFrame::where('caliber', $Steels->caliber)->get();
        if($PriceMiniatureFrames->count() > 0){
            foreach($PriceMiniatureFrames as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'MARCO')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->total_kg * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $PriceStructuralFrames = PriceStructuralFrameworks::where('caliber', $Steels->caliber)->get();
        if($PriceStructuralFrames->count() > 0){
            foreach($PriceStructuralFrames as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'MARCO')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->total_kg * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeBox2Joists = TypeBox2Joist::where('caliber', $Steels->caliber)->get();
        if($TypeBox2Joists->count() > 0){
            foreach($TypeBox2Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeBox25Joists = TypeBox25Joist::where('caliber', $Steels->caliber)->get();
        if($TypeBox25Joists->count() > 0){
            foreach($TypeBox25Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeC2Joists = TypeC2Joist::where('caliber', $Steels->caliber)->get();
        if($TypeC2Joists->count() > 0){
            foreach($TypeC2Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeChairJoists = TypeChairJoist::where('caliber', $Steels->caliber)->get();
        if($TypeChairJoists->count() > 0){
            foreach($TypeChairJoists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeL2Joists = TypeL2Joist::where('caliber', $Steels->caliber)->get();
        if($TypeL2Joists->count() > 0){
            foreach($TypeL2Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeL25Joists = TypeL25Joist::where('caliber', $Steels->caliber)->get();
        if($TypeL25Joists->count() > 0){
            foreach($TypeL25Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeLJoists = TypeLJoist::where('caliber', $Steels->caliber)->get();
        if($TypeLJoists->count() > 0){
            foreach($TypeLJoists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeLRJoists = TypeLRJoist::where('caliber', $Steels->caliber)->get();
        if($TypeLRJoists->count() > 0){
            foreach($TypeLRJoists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeStructuralJoists = TypeStructuralJoist::where('caliber', $Steels->caliber)->get();
        if($TypeStructuralJoists->count() > 0){
            foreach($TypeStructuralJoists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        return redirect()->route('steels.index')->with('create_reg', 'ok');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Steels = Steel::find($id);
        return view('admin.steels.show', compact(
            'Steels',
        ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'caliber' => 'required',
            'type' => 'required',
            'cost' => 'required',
        ];

        $messages = [
            'caliber.required' => 'Escriba el Calibre del Acero',
            'type.required' => 'Escriba el tipo de acero',
            'cost.required' => 'Capture el Costo',
        ];

        $request->validate($rules, $messages);

        $Steels = Steel::find($id);
        $Steels->caliber = $request->caliber;
        $Steels->type = $request->type;
        $Steels->cost = $request->cost;
        $Steels->save();

        $ListPrices = PriceList::where('caliber', $Steels->caliber)->where('type', $Steels->type)->get();
        if($ListPrices->count() > 0){
            foreach($ListPrices as $row){
                $row->cost = $Steels->cost;
                $row->save();
            }
        }
        
        $PriceFrames = PriceFrame::where('caliber', $Steels->caliber)->get();
        if($PriceFrames->count() > 0){
            foreach($PriceFrames as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'MARCO')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->total_kg * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $PriceMiniatureFrames = PriceMiniatureFrame::where('caliber', $Steels->caliber)->get();
        if($PriceMiniatureFrames->count() > 0){
            foreach($PriceMiniatureFrames as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'MARCO')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->total_kg * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $PriceStructuralFrames = PriceStructuralFrameworks::where('caliber', $Steels->caliber)->get();
        if($PriceStructuralFrames->count() > 0){
            foreach($PriceStructuralFrames as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'MARCO')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->total_kg * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $Bars = PriceListBar::where('caliber', $Steels->caliber)->get();
        if($Bars->count() > 0){
            foreach($Bars as $row){
                $PriceList = PriceList::where('system', 'ACCESORIOS')->where('piece', 'PROTECTOR')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * 2.5;
                    $TotalPrice = $row->weight * $Price;
                    $row->cost = $PriceList->cost*$row->weight;
                    $row->sale_price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $ProtectorComponents = PriceListProtector::where('caliber', $Steels->caliber)->get();
        if($ProtectorComponents->count() > 0){
            foreach($ProtectorComponents as $row){
                $PriceList = PriceList::where('system', 'ACCESORIOS')->where('piece', 'PROTECTOR')->where('caliber', $row->caliber)->first();
                
                if($PriceList){
                    $Price = $PriceList->cost * $row->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->cost = $PriceList->cost*$row->weight;
                    $row->sale_price = $TotalPrice;
                    $row->save();
                }
            }
        }
        $TypeBox2Joists = TypeBox2Joist::where('caliber', $Steels->caliber)->get();
        if($TypeBox2Joists->count() > 0){
            foreach($TypeBox2Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }
        
        $TypeBox25Joists = TypeBox25Joist::where('caliber', $Steels->caliber)->get();
        if($TypeBox25Joists->count() > 0){
            foreach($TypeBox25Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }
     
        $TypeC2Joists = TypeC2Joist::where('caliber', $Steels->caliber)->get();
        if($TypeC2Joists->count() > 0){
            foreach($TypeC2Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }
        
        $TypeChairJoists = TypeChairJoist::where('caliber', $Steels->caliber)->get();
        if($TypeChairJoists->count() > 0){
            foreach($TypeChairJoists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeL2Joists = TypeL2Joist::where('caliber', $Steels->caliber)->get();
        if($TypeL2Joists->count() > 0){
            foreach($TypeL2Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeL25Joists = TypeL25Joist::where('caliber', $Steels->caliber)->get();
        if($TypeL25Joists->count() > 0){
            foreach($TypeL25Joists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeLJoists = TypeLJoist::where('caliber', $Steels->caliber)->get();
        if($TypeLJoists->count() > 0){
            foreach($TypeLJoists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }

        $TypeLRJoists = TypeLRJoist::where('caliber', $Steels->caliber)->get();
        if($TypeLRJoists->count() > 0){
            foreach($TypeLRJoists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }
       
        $TypeStructuralJoists = TypeStructuralJoist::where('caliber', $Steels->caliber)->get();
        if($TypeStructuralJoists->count() > 0){
            foreach($TypeStructuralJoists as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }
        $Floors = Floor::where('caliber', $Steels->caliber)->get();
        if($Floors->count() > 0){
            foreach($Floors as $row){
                $PriceList = PriceList::where('system', 'SELECTIVO')->where('piece', 'VIGA')->where('caliber', $row->caliber)->first();
                if($PriceList){
                    $Price = $PriceList->cost * $PriceList->f_total;
                    $TotalPrice = $row->weight * $Price;
                    $row->price = $TotalPrice;
                    $row->save();
                }
            }
        }
        
       
        return redirect()->route('steels.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Steel::destroy($id);

        return redirect()->route('steels.index')->with('eliminar', 'ok');
    }
}