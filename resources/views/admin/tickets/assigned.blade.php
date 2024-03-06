<!-- resources/views/admin/tickets/assigned.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assigned Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="font-semibold text-lg mb-4">{{ __('Assigned Tickets') }}</h3>
                @if ($assignedTickets->isEmpty())
                <p>{{ __('You have no assigned tickets.') }}</p>
                @else
                <ul>
                    @foreach ($assignedTickets as $ticket)
                    <li>{{ $ticket->subject }}
                        <form method="POST" action="{{ route('admin.tickets.resolve', $ticket->id_ticket) }}" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Resolve</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>