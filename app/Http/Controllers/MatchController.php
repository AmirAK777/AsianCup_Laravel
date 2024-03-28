<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchModel;
use App\Models\Stade;
use Illuminate\Validation\Rule;
use App\Models\Team;
use App\Models\Billet;
use Illuminate\Support\Facades\Log;

class MatchController extends Controller
{
    public function create()
    {
        $stades = Stade::all();
        $teams = Team::all();
        return view('matches.create', compact('stades', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'stade_id' => 'required|exists:stades,id_stade',
            'team1_id' => [
                'required',
                'exists:teams,id_team',
                Rule::notIn([$request->team2_id]),
            ],
            'team2_id' => [
                'required',
                'exists:teams,id_team',
                Rule::notIn([$request->team1_id]),
            ],
            'price' => 'required|numeric|min:0',
            'match_image' => 'required|url',

        ]);

        MatchModel::create([
            'name' => $request->name,
            'date' => $request->date,
            'id_stade' => $request->stade_id,
            'id_team1' => $request->team1_id,
            'id_team2' => $request->team2_id,
            'price' => $request->price,
            'status' => $request->status,
            'match_image' => $request->match_image,

        ]);

        return redirect()->route('matches.create')->with('success', 'Match created successfully.');
    }

    public function show($id)
    {
        $match = MatchModel::findOrFail($id);
        $match = MatchModel::find($id);
        $stade = $match->stade; // Récupérer les détails du stade pour le match

        // Récupérez le nombre total de places disponibles dans le stade
        $totalPlaces = $stade->places;

        // Récupérez le nombre total de billets vendus pour ce match dans ce stade
        $totalBilletsVendus = Billet::where('id_match', $id)->sum('quantity');

        // Calculez le nombre de billets restants

    
        $billetsRestants = $totalPlaces - $totalBilletsVendus;
        return view('matches.show', compact('match', 'billetsRestants', 'totalPlaces'));
    }
}
