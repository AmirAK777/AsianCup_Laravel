<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

use App\Models\Billet;
use App\Models\Command;
use App\Models\CommandSellDetail;

class BilletController extends Controller
{
    public function index()
    {
        $billets = Auth::user()->billets;
        return view('billet.index', compact('billets'));
    }

    public function download($id)
    {
        $billet = Billet::findOrFail($id);

        $pdf = Pdf::loadView('billet.billet', [
            'billet' => $billet,
            'user' => $billet->user,
            'match' => $billet->match,
        ]);

        return $pdf->download("billet_" . $id . ".pdf");
    }

    public function sellTicket($id)
    {
        $billet = Billet::findOrFail($id);
        if ($billet->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à vendre ce billet.');
        }

        $billet->is_for_sale = true;
        $billet->save();

        return redirect()->back()->with('success', 'Le billet a été mis en vente avec succès.');
    }

    public function buyTicket($id)
    {
        $billet = Billet::findOrFail($id);

        if (!$billet->is_for_sale) {
            return redirect()->back()->with('error', 'Ce billet n\'est pas actuellement en vente.');
        }

        $command = Command::firstOrCreate(['user_id' => Auth::id()]);
        $cartDetail = CommandSellDetail::updateOrCreate([
            'command_id' => $command->id,
            'billet_id' => $billet->billet_id,
            'billet_date' => $billet->billet_date,
            'category' => $billet->category,
        ], [
            'quantity' => $billet->quantity,
        ]);

        $command->save();

        return redirect()->back()->with('success', 'Le billet a été ajouté à votre panier avec succès.');
    }

    public function sellableBillets()
    {
        // Récupérer les billets en vente
        $sellableBillets = Billet::where('is_for_sale', true)->get();

        // Retourner la vue avec les billets en vente
        return view('billet.sellable-billets', ['sellableBillets' => $sellableBillets]);
    }
}
