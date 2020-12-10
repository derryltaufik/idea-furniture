<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\TransactionHeader;
use App\TransactionDetail;

class TransactionController extends Controller
{
    public function indexCart($id){
        $cart = Cart::where('user_id', '=', $id)->get();

        $grandTotal = 0;
        foreach($cart as $cartItem){
            $grandTotal = $grandTotal + ($cartItem->product->price * $cartItem->quantity);
        }

        $data = [
            'cart' => $cart,
            'grandTotal' => $grandTotal
        ];

        return view('cart')->with($data);
    }

    public function deleteItem($id, $itemId){
        Cart::find($itemId)->delete();

        return back();
    }

    public function updateItem(Request $request, $id, $itemId){
        $cart = Cart::find($itemId);
        $qty = $request->quantity;
        if($qty > 0){
            $cart->quantity = $request->quantity;
            $cart->save();
        }else{
            $cart->delete();
        }

        return back();
    }

    public function checkout(Request $request, $id){
        $grandTotal = $request->grandTotal;
        $cart = Cart::where('user_id', '=', $id)->get();

        $transactionHeader = new TransactionHeader;
        $transactionHeader->user_id = \Auth::user()->id;
        $transactionHeader->grand_total = $grandTotal;
        $transactionHeader->save();

        foreach($cart as $cartItem){
            $transactionDetail = new TransactionDetail;
            $transactionDetail->transaction_header_id = $transactionHeader->id;
            $transactionDetail->product_id = $cartItem->id;
            $transactionDetail->quantity = $cartItem->quantity;
            $transactionDetail->save();
            $cartItem->delete();
        }

        return back();
    }

    public function indexHistory($id){
        $transactionHeaders = TransactionHeader::where('user_id',$id)->orderBy('created_at','desc')->get();

        return view('history')->with('transactionHeaders',$transactionHeaders);
    }
}
