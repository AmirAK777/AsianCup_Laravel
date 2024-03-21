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
        Log::channel('abuse')->info("billet: " .  $billets);

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
}