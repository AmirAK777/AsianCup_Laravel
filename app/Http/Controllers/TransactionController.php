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
    public function index()
    {
        $transactions = Auth::user()->transactions;
        Log::channel('abuse')->info('transactions', [
            'test' =>   $transactions,
        ]);

        return view('transaction.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        if (!$request->terms_check) {
            return redirect()->route('cart.index');
        }

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);


        $commands = Auth::user()->command->details;

        $commandsSells = Auth::user()->command->detailsSell;
        if ($commands->isNotEmpty()) {
            foreach ($commands as $command) {
                $transDetail = TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'id_match' => $command->id_match,
                    'billet_date' => $command->billet_date,
                    'quantity' => $command->quantity,
                    'category' => $command->category,

                ]);
                $billet = Billet::create([
                    'billet_id' => Str::uuid(),
                    'user_id' => Auth::user()->id,
                    'id_match' => $command->id_match,
                    'billet_date' => $command->billet_date,
                    'quantity' => $command->quantity,
                    'category' => $command->category,
                    'status' => true
                ]);


                if (!$transDetail) {
                    $transaction->delete();
                    return redirect()->route('cart.detail')->with('fail', 'Pembayaran gagal');
                } else {

                    $command->delete();
                }
            }
        }
        if ($commandsSells->isNotEmpty()) {
            foreach ($commandsSells as $commandSell) {
                $billet_id = $commandSell->billet_id;
                $billet = Billet::find($billet_id);
                Log::channel('abuse')->info('Billet', [
                    'test' =>   $billet_id,
                ]);
        
                $transDetail = TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'billet_date' => $commandSell->billet_date,
                    'quantity' => $commandSell->quantity,
                    'category' => $commandSell->category,
                    'billet_id' => $commandSell->billet_id,


                ]);
                if ($billet) {
                    $billet->user_id = Auth::id();
                    $billet->is_for_sale = false;
                    $billet->save();
                }

                $commandSell->delete();
            }
        }
        return redirect()->route('transaction.index')->with('success', 'Pembayaran berhasil!');
    }
}
