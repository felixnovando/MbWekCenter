<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use const http\Client\Curl\AUTH_ANY;

class CartController extends Controller
{

    public function clearCart(){
        $user_id = Auth::user()->id;
        DB::table('carts')
            ->where('user_id', $user_id)
            ->delete();
    }

    public function getCart(){
        $user_id = Auth::user()->id;
        $carts = Cart::where("user_id", "=", $user_id)->get();
        return $carts;
    }

    public function deleteCart($id){
        $user_id = Auth::user()->id;
        DB::table('carts')
            ->where('product_id', $id)
            ->where('user_id', $user_id)
            ->delete();

        return redirect()->back();
    }

    public function getCartPage(){
        $user_id = Auth::user()->id;

        $carts = Cart::where("user_id", "=", $user_id)->get();
        return view('cart', compact('carts'));
    }

    public function addCart(Request $request){
        $request->validate([
            'id' => 'required',
            'qty' => 'numeric|min:1'
        ]);

        //kalau dia lebih dari stock
        $product = Product::where("id", "=", $request->id)->first();
        if($request->qty > $product->stock){
            return redirect()->back()->withErrors(['error'=>'Cannot Purchase more than stock']);
        }

        $user_id = Auth::user()->id;
        //cek dulu uda ada dk
        $cart = Cart::where("product_id", "=", $request->id)->where("user_id", "=", $user_id)->first();
        if($cart == null){
            //insert
            $cart = new Cart();
            $cart->product_id = $request->id;
            $cart->user_id = $user_id;
            $cart->qty = $request->qty;
            $cart->save();
        }else{
            //update
            DB::table('carts')
                ->where('product_id', $request->id)
                ->where('user_id', $user_id)
                ->update(['qty' => $request->qty]);
        }

        return redirect()->back();
    }
}
