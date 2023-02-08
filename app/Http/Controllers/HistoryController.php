<?php

namespace App\Http\Controllers;

use App\Models\ItemTransaction;
use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    function ShowHistory(){
        $orders = Order::get()->where('account_id',auth()->user()->account_id);
        return view('history.index',['items' => $orders]);
    }
    function ShowDetailHistory($locale = 'en', $id){
        $details = ItemTransaction::get()->where('account_id',auth()->user()->account_id)->where('paid',1)->where('order_id',$id);
        $date = Order::get()->where('account_id',auth()->user()->account_id)->where('order_id',$id)->first();
        return view('history.detail',['details'=>$details,'date'=>$date->created_at]);
    }
}
