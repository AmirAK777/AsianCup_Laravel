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
        $request->validate([
            'name' => 'required|string|max:255',
            'cty' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'graph_image' => 'required|url',
            'place' => 'required|numeric|min:0',

        ]);

        Stade::create([
            'name' => $request->name,
            'cty' => $request->cty,
            'location' => $request->location,
            'graph_image' => $request->graph_image,
            'place' => $request->place,

        ]);

        return redirect()->route('stades.create')->with('success', 'Stade created successfully.');
    }
}