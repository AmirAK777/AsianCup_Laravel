<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;

use App\Http\Requests\CommandRequest;
use App\Models\Command;
use App\Models\CommandDetail;
use App\Models\CommandSellDetail;
use App\Models\Billet;
use App\Models\MatchModel;

use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $match = MatchModel::findOrFail($request->id_match);
        $match = MatchModel::find($request->id_match);
        $stade = $match->stade;
        $totalPlaces = $stade->places;
        $totalBilletsVendus = Billet::where('id_match', $request->id_match)->sum('quantity');
        $billetsRestants = $totalPlaces - $totalBilletsVendus;


        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'category' => 'required|integer|min:1',
        ]);
        $command = Command::firstOrCreate(['user_id' => Auth::user()->id]);
        if ($validatedData['quantity'] <= $billetsRestants) {
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

            return redirect()->route('matches.show', ['id' => $request->id_match])->with('success', $status);
        } else {
            return redirect()->back()->with('error', 'Quantité demandée supérieure au nombre de billets restants');
        }
    }

    public function storeBillet(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'billet_id' => 'required',
            'billet_date' => 'required|date',
        ]);

        $command = Command::firstOrCreate(['user_id' => Auth::user()->id]);

        $cartDetailBillet = CommandSellDetail::updateOrCreate([
            'command_id' => $command->id,
            'billet_id' => $request->billet_id,
        ], [
            'quantity' => $validatedData['quantity'],
            'category' => $validatedData['category'],
            'billet_date' => $validatedData['billet_date'],
        ]);

        $command->save();

        $status = $cartDetailBillet->wasRecentlyCreated ? 'Successfully added item(s) to the order' : 'Order successfully updated';

        return redirect()->route('matches.show', ['id' => $request->id_match])->with('status', $status);
    }

    public function index()
    {
        $command = Command::firstOrNew([
            'user_id' => Auth::user()->id
        ]);


        $matchDetails = $command->detailsSell;

        $ticketDetails = $command->details;

        $commands = $matchDetails->merge($ticketDetails);

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
        // Essayer de trouver le modèle CommandDetail
        $cartDetail = CommandDetail::find($id);

        // Si le modèle CommandDetail n'est pas trouvé, essayer CommandSellDetail
        if (!$cartDetail) {
            $cartDetail = CommandSellDetail::find($id);
        }

        // Si un modèle est trouvé, supprimer et rediriger en conséquence
        if ($cartDetail) {
            if ($cartDetail->delete()) {
                return redirect()->route('cart.index')->with('success', 'Berhasil menghapus keranjang');
            } else {
                return redirect()->route('cart.index')->with('fail', 'Gagal menghapus keranjang');
            }
        } else {
            // Aucun modèle trouvé avec l'ID donné
            return redirect()->route('cart.index')->with('fail', 'Keranjang tidak ditemukan');
        }
    }
}
