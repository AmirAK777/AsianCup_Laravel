<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;

use App\Http\Requests\CommandRequest;
use App\Models\Command;
use App\Models\CommandDetail;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'category' => 'required|integer|min:1',
        ]);
        $command = Command::firstOrCreate(['user_id' => Auth::user()->id]);

        $cartDetail = CommandDetail::updateOrCreate([
            'command_id' => $command->id,
            'id_match' => $request->id_match,
            'billet_date' => $request->billet_date,
            'category' => $request->category,

        ], [
            'quantity' => $validatedData['quantity'],
        ]);

        $command->save();
        $status = $cartDetail->wasRecentlyCreated ? 'Successfully added item(s) to the order' : 'Order successfully updated';

        return redirect()->route('matches.show', ['id' => $request->id_match])->with('status', $status);
    }


    public function index()
    {
        $command = Command::firstOrNew([
            'user_id' => Auth::user()->id
        ]);

        $commands = $command->details;
        return view('cart.index', compact('commands'));
    }

    public function showForm($id)
    {
        $cart = CommandDetail::findOrFail($id);
        return view('cart.edit', compact('cart'));
    }

    public function update($id, CommandRequest $request)
    {
        $validated = $request->validated();

        $cart = CommandDetail::findOrFail($id)->update([
            'billet_date' => $validated['billet_date'],
            'quantity' => $validated['quantity']
        ]);

        if ($cart)
            return redirect()->route('cart.index')->with('success', 'Berhasil mengubah keranjang');

        else
            return redirect()->route('cart.index')->with('fail', 'Gagal mengubah keranjang');
    }

    public function delete($id)
    {
        $cart = CommandDetail::findOrFail($id);

        if ($cart->delete())
            return redirect()->route('cart.index')->with('success', 'Berhasil menghapus keranjang');

        else
            return redirect()->route('cart.index')->with('fail', 'Gagal menghapus keranjang');
    }

    // App\Models\Command

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}