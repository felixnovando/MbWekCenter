<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function getDetailTransactionPage($id){
        $transaction = Transaction::where("id", "=", $id)->first();
        return view('detailTransaction', compact('transaction'));
    }
}
