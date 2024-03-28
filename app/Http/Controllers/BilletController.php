<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    
        // Créer l'URL pour le QR Code
        $qrCodeText = "https://www.the-afc.com/en/national/afc_asian_cup/home.html".$billet->id;
        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrCodeText);
    
        // Télécharge l'image QR Code
        $qrCodeImage = file_get_contents($qrCodeUrl);
        $qrCodeDataUri = 'data:image/png;base64,' . base64_encode($qrCodeImage);
    
        $pdf = Pdf::loadView('billet.billet', [
            'billet' => $billet,
            'user' => $billet->user,
            'match' => $billet->match,
            'qrCodeDataUri' => $qrCodeDataUri
        ]);
    
        return $pdf->download("billet_".$id.".pdf");
    }

    public function show($id) {
        // Assurez-vous que Match et Team sont inclus dans les instructions 'use' en haut du fichier
        $match = \App\Models\Match::find($id); // Remplacez 'Match::find' par le chemin correct
        // Ici, vous devriez vérifier que vous avez obtenu un match avant d'essayer d'accéder à ses propriétés
        if ($match) {
            $team1 = \App\Models\Team::find($match->team1_id); // Assurez-vous que le nom du modèle Team est correct et que team1_id est la bonne propriété
            $team2 = \App\Models\Team::find($match->team2_id); // Même chose ici pour team2_id
    
            // Assurez-vous que vous les passez à la vue
            return view('your-view', compact('match', 'team1', 'team2'));
        } else {
            // Gérez le cas où le match n'est pas trouvé
            abort(404); // ou retournez une autre réponse appropriée
        }
    }
    
    

    
}