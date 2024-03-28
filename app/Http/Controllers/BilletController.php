<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

use App\Models\Billet;

class BilletController extends Controller
{
    public function index(){
        $billets = Auth::user()->billets;
        return view('billet.index', compact('billets'));
    }

    public function download($id){
        $billet = Billet::findOrFail($id);

        $pdf = Pdf::loadView('billet.billet', [
            'billet' => $billet,
            'user' => $billet->user,
            'match' => $billet->match,
        ]);

        return $pdf->download("billet_".$id.".pdf");
    }

    public function sellTicket($id) {
        $billet = Billet::findOrFail($id);
        // Vérifiez si l'utilisateur actuel est le propriétaire du billet
        if ($billet->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à vendre ce billet.');
        }
    
        // Mettez à jour l'état du billet pour indiquer qu'il est en vente
        $billet->is_for_sale = true;
        $billet->save();
    
        return redirect()->back()->with('success', 'Le billet a été mis en vente avec succès.');
    }
    
    // Méthode pour acheter un billet en vente
    public function buyTicket($id) {
        $billet = Billet::findOrFail($id);
        // Vérifiez si le billet est en vente
        if (!$billet->is_for_sale) {
            return redirect()->back()->with('error', 'Ce billet n\'est pas actuellement en vente.');
        }
    
        // Mettez à jour les détails du billet pour le nouvel acheteur
        $billet->user_id = Auth::id();
        $billet->is_for_sale = false; // Mettez à jour l'état du billet
        $billet->save();
    
        return redirect()->back()->with('success', 'Vous avez acheté le billet avec succès.');
    }
    public function sellableBillets()
    {
        // Récupérer les billets en vente
        $sellableBillets = Billet::where('is_for_sale', true)->get();

        // Retourner la vue avec les billets en vente
        return view('billet.sellable-billets', ['sellableBillets' => $sellableBillets]);
    }
}