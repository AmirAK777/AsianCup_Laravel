<?php

namespace App\Http\Controllers;

use App\Models\Billet;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Log;

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


        $commands = Auth::user()->command->details;

        Log::channel('abuse')->info("tra: " .  $commands);

        foreach($commands as $command){
            $transDetail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'id_match' => $command->id_match,
                'billet_date' => $command->billet_date,
                'quantity' => $command->quantity,
            ]);
            $billet = Billet::create([
                'billet_id' => "Str::random(12)",
                'user_id' => Auth::user()->id,
                'id_match'=> $command->id_match,
                'billet_date' => $command->billet_date,
                'quantity' => $command->quantity,
                'status' => true
            ]);
            if(!$transDetail){
                $transaction->delete();
                return redirect()->route('cart.detail')->with('fail','Pembayaran gagal');
            }else{
                $command->delete();
            }
        }
        return redirect()->route('transaction.index')->with('success','Pembayaran berhasil!');
    }
}
