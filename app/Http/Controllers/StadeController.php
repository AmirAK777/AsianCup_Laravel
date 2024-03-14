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
            'image_stade' => 'required|string|max:255',
        ]);

        Stade::create([
            'name' => $request->name,
            'cty' => $request->cty,
            'image_stade' => $request->image_stade,
        ]);

        return redirect()->route('stades.create')->with('success', 'Stade created successfully.');
    }
}