<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemTransaction;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function ShowHomePage(){
        $items = Item::latest()->paginate(10);
        return view('home',[
            'items' => $items,
        ]);
    }
    function ShowDetail($locale = "en", $id){
        $item = Item::get()->where('item_id',$id)->first();

        return view('detail',[
            'item' => $item
        ]);
    }
    function BuyItem(Request $request,$locale = "en", $id){
        $item_order = [
            'account_id' => auth()->user()->account_id,
            'item_id' => $id,
            'quantity' => $request->all()['qty']
        ];
        ItemTransaction::create($item_order);
        return redirect($locale .'/home/'.$id)->with('success',"Your item has been added to cart");
    }
}
