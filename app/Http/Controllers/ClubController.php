<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class ClubController extends Controller
{
    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'club_name' => 'required|string|max:255',
            'club_image' => 'required|url',
        ]);

        Team::create([
            'club_name' => $request->club_name,
            'club_image' => $request->club_image,
        ]);

        return redirect()->route('teams.create')->with('success', 'Équipe créée avec succès.');
    }
}