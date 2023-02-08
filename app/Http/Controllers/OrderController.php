<?php

namespace App\Http\Controllers;

use App\Models\ItemTransaction;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{
    //
    function ShowOrders()
    {
        $transactions = ItemTransaction::get()->where('account_id', auth()->user()->account_id)->where('paid', '0');
        $price = 0;
        $finalPrice = 0;
        foreach ($transactions as $tf) {
            $price += $tf->item->price * $tf->quantity;
            $tf['price'] = $price;
            $finalPrice += $price;
            $price = 0;
        }
        return view('cart', ['orders' => $transactions, 'total' => $finalPrice]);
    }
    function DeleteOrder($locale, $id)
    {
        ItemTransaction::destroy('id', $id);
        return redirect(App::getLocale() . '/cart')->with('success', "An Item has been removed");
    }
    function CheckOutOrders($locale = 'en')
    {
        $userID = auth()->user()->account_id;
        $cart_items = ItemTransaction::get()->where('account_id', $userID)->where('paid', '0');
        $final_price = 0;
        foreach ($cart_items as $item) {
            $final_price += $item->quantity * $item->item->price;
        }
        $order = Order::create([
            'account_id' => $userID,
            'price' => $final_price
        ]);
        foreach ($cart_items as $item) {
            ItemTransaction::where('account_id', $userID)->where('paid', '0')->update(['paid' => 1, 'order_id' => $order->order_id]);
        }
        return redirect($locale . '/cart/success');
    }
}
