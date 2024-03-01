<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billet;
use App\Models\MatchModel;

class BilletController extends Controller
{
    public function create()
    {
        $matches = MatchModel::all();
        return view('billets.create', compact('matches'));
    }
 public function store(Request $request)
    {
        $request->validate([
            'id_match' => 'required|exists:match,id_match',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'availability' => 'required|boolean',
            'quantity' => 'required|integer|min:1', 
        ]);

        for ($i = 0; $i < $request->quantity; $i++) {
            Billet::create([
                'id_match' => $request->id_match,
                'category' => $request->category,
                'price' => $request->price,
                'availability' => $request->availability,
            ]);
        }

        return redirect()->route('billets.create')->with('success', 'Les billets ont été créés avec succès.');
    }
}