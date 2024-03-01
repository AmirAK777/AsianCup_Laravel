<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketUserController extends Controller
{
    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $ticket = new Ticket();
        $ticket->subject = $request->subject;
        $ticket->description = $request->description;
        $ticket->id_user = auth()->id();
        $ticket->status = 'pending';
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function index()
    {
        $userTickets = Ticket::where('id_user', auth()->id())->get();
        return view('tickets.index', compact('userTickets'));
    }
}