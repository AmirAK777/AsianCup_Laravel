<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Match Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-semibold">Match Details</h3>
                        <p><strong>Name:</strong> {{ $match->name }}</p>
                        <p><strong>Date:</strong> {{ $match->date }}</p>
                        <p><strong>Stadium:</strong> {{ $match->stade->name }}</p>
                        <p><strong>Team 1:</strong> {{ $match->team1->name }}</p>
                        <p><strong>Team 2:</strong> {{ $match->team2->name }}</p>
                        <!-- Ajoutez d'autres détails du match ici -->
                    </div>
                </div>
            </div>
        </div>
        <form method="GET" action="{{ route('matches.show', ['id' => $match->id_match]) }}">
            <x-primary-button type="submit">
                {{ __('Details') }}
            </x-primary-button>
        </form>
        <form action="{{ route('cart.create', ['id_match' => $match->id_match, 'billet_date' => $match->date]) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                <input type="hidden" name="billet_date" value="{{ $match->date }}">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="ex: 1" min="0" value="{{ old('quantity') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Beli Tiket</button>
        </form>
    </div>
</x-app-layout>