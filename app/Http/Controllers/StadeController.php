<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stade;

class StadeController extends Controller
{
    public function create()
    {
        return view('stades.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'cty' => 'required|string|max:255',
        ]);

        // Créer un nouveau stade
        Stade::create([
            'name' => $request->name,
            'cty' => $request->cty,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('stades.create')->with('success', 'Stade created successfully.');
    }
}