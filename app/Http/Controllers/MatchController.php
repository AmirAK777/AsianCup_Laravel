<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchModel;
use App\Models\Stade;
use Illuminate\Validation\Rule;
use App\Models\Team;

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
                Rule::notIn([$request->team2_id]), // Vérifie que team1_id n'est pas identique à team2_id
            ],
            'team2_id' => [
                'required',
                'exists:teams,id_team',
                Rule::notIn([$request->team1_id]), // Vérifie que team2_id n'est pas identique à team1_id
            ]
        ]);

        MatchModel::create([
            'name' => $request->name,
            'date' => $request->date,
            'id_stade' => $request->stade_id,
            'id_team1' => $request->team1_id,
            'id_team2' => $request->team2_id,
        ]);

        return redirect()->route('matches.create')->with('success', 'Match created successfully.');
    }
}