<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Auth::user()->transactions;
        return view('transaction.index', compact('transactions'));
    }

    public function store(Request $request){
        if(!$request->terms_check){
            return redirect()->route('cart.index');
        }

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);
        $carts = Auth::user()->cart->details;
        foreach($carts as $cart){
            $transDetail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'item_id' => $cart->item_id,
                'billet_date' => $cart->billet_date,
                'quantity' => $cart->quantity,
            ]);
            $ticket = Ticket::create([
                'ticket_id' => Str::random(12),
                'user_id' => Auth::user()->id,
                'id_match'=> $cart->item_id,
                'billet_date' => $cart->billet_date,
                'quantity' => $cart->quantity,
                'status' => true
            ]);
            if(!$transDetail){
                $transaction->delete();
                return redirect()->route('cart.detail')->with('fail','Pembayaran gagal');
            }else{
                $cart->delete();
            }
        }
        return redirect()->route('transaction.index')->with('success','Pembayaran berhasil!');
    }
}
