<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchModel;
use App\Models\Stade;

class MatchController extends Controller
{
    public function create()
    {
        $stades = Stade::all();
        return view('matches.create', compact('stades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'stade_id' => 'required|exists:stade,id_stade'
        ]);

        MatchModel::create([
            'name' => $request->name,
            'date' => $request->date,
            'id_stade' => $request->stade_id
        ]);

        return redirect()->route('matches.create')->with('success', 'Match created successfully.');
    }
}
