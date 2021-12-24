<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function getTransactionPage(){
        $user_id = Auth::user()->id;
        $transactions = Transaction::where("user_id", "=", $user_id)->get();
        return view('transaction', compact('transactions'));
    }

    public function addTransaction(){
        $cartController = new CartController();
        $user_id = Auth::user()->id;

        #get carts
        $carts = $cartController->getCart();

        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $transaction->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $transaction->save();

        $transaction_id = $transaction->id;

        foreach ($carts as $cart){
            $detail = new Detail();
            $detail->transaction_id = $transaction_id;
            $detail->product_id = $cart->product_id;
            $detail->qty = $cart->qty;
            $detail->save();
        }

        #clear cart
        $cartController->clearCart();

        return redirect()->back();
    }
}
