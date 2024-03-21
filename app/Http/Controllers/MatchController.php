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
        return view('matches.show', compact('match'));
    }
}