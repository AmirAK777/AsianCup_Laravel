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
                    </div>
                </div>
            </div>
        </div>
        <form method="GET" action="{{ route('matches.show', ['id' => $match->id_match]) }}">
            <x-primary-button type="submit">
                {{ __('Details') }}
            </x-primary-button>
        </form>
        <form action="{{ route('cart.create') }}" method="POST">
            @csrf
            <input type="hidden" name="id_match" value="{{ $match->id_match }}">
            <input type="hidden" name="billet_date" value="{{ $match->date }}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="quantity" class="form-label">Quantité :</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="ex: 1" min="0" value="{{ old('quantity') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Acheter</button>
        </form>
    </div>
</x-app-layout>