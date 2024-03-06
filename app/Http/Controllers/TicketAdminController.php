<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
        $this->middleware('admin'); 
    }

    public function index()
    {
        $pendingTickets = Ticket::where('status', 'pending')->get();

        return view('admin.tickets.index', compact('pendingTickets'));
    }

    public function assign(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $ticket->status = 'in progress';
        $ticket->id_support = auth()->user()->id; 
        $ticket->save();

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket assigned successfully.');
    }

    public function assignedTickets()
    {
        $assignedTickets = Ticket::where('id_support', auth()->user()->id)->get();

        return view('admin.tickets.assigned', compact('assignedTickets'));
    }

    
    public function resolve(Request $request, $id)
    {
        $ticket = Ticket::where('id_ticket', $id)->firstOrFail();

        if ($ticket->id_support != auth()->user()->id) {
            return redirect()->route('admin.tickets.index')->with('error', 'You are not assigned to this ticket.');
        }

        $ticket->status = 'resolved';
        $ticket->save();

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket resolved successfully.');
    }
}
