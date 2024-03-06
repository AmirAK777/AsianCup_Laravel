<!-- admin/tickets/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets en Attente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Liste des Tickets en Attente</h3>
                @if ($pendingTickets->isEmpty())
                    <p>Aucun ticket en attente trouvé.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($pendingTickets as $ticket)
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <h4 class="font-semibold text-lg mb-2">{{ $ticket->subject }}</h4>
                                <p class="text-gray-600 mb-2">{{ $ticket->description }}</p>
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('admin.tickets.assign', ['id' => $ticket->id]) }}" class="text-blue-500 hover:text-blue-700">Assigner</a>
                                    <span class="text-xs text-gray-500">{{ $ticket->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
