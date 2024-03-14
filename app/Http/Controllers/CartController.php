<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Http\Requests\CommandRequest;
use App\Models\Command;
use App\Models\CommandDetail;

class CartController extends Controller
{
    public function store(CommandRequest $request){
        $validated = $request->validated();
        $cart = Command::firstOrNew([
            'user_id' =>  auth()->id(),
        ]);
        $cart->save();
        $cartDetail = CommandDetail::updateOrCreate([
            'command_id' => auth()->id(),
            'id_match' => $request->id_match,
            'billet_date' => $request->billet_date,
        ],[
            'quantity' => $validated['quantity']
        ]);
        $status = ($cartDetail->wasRecentlyCreated) ? 'Berhasil menambahkan barang ke pesanan' : 'Pesanan berhasil diubah';

        return redirect()->route('matches.show', ['id' => $request->id_match])->with('status', $status);
    }

    public function index(){
        $cart = Command::firstOrNew([
            'user_id' => Auth::user()->id
        ]);
        $carts = $cart->details;
        return view('cart.index', compact('carts'));
    }

    public function showForm($id){
        $cart = CommandDetail::findOrFail($id);
        return view('cart.edit', compact('cart'));
    }

    public function update($id, CommandRequest $request){
        $validated = $request->validated();

        $cart = CommandDetail::findOrFail($id)->update([
            'billet_date' => $validated['billet_date'],
            'quantity' => $validated['quantity']
        ]);

        if($cart)
        return redirect()->route('cart.index')->with('success', 'Berhasil mengubah keranjang');

        else
        return redirect()->route('cart.index')->with('fail', 'Gagal mengubah keranjang');
    }

    public function delete($id){
        $cart = CommandDetail::findOrFail($id);

        if($cart->delete())
        return redirect()->route('cart.index')->with('success', 'Berhasil menghapus keranjang');

        else
        return redirect()->route('cart.index')->with('fail', 'Gagal menghapus keranjang');
    }
}
