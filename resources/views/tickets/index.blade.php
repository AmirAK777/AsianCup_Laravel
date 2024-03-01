<!-- resources/views/tickets/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tickets') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if ($userTickets->isEmpty())
                            <p>{{ __('You have no tickets yet.') }}</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Subject') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Created At') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userTickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->subject }}</td>
                                            <td>{{ $ticket->status }}</td>
                                            <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
