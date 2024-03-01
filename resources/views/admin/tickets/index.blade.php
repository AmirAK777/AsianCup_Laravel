<!-- admin/tickets/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pending Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">List of Pending Tickets</h3>
                @if ($pendingTickets->isEmpty())
                    <p>No pending tickets found.</p>
                @else
                    <ul class="list-disc list-inside">
                        @foreach ($pendingTickets as $ticket)
                            <li>
                                {{ $ticket->subject }}
                                <a href="{{ route('admin.tickets.assign', ['id' => $ticket->id]) }}" class="text-blue-500">Assign</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
