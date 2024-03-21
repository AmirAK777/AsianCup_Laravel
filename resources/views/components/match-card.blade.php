<div class="mx-auto max-w-md rounded-lg bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="flex items-center justify-between p-4 h-14 bg-gray-100">
        <h2 class="text-lg font-bold text-gray-800">Match Details</h2>
        <a href="{{ $match->slug }}/" class="text-blue-500 hover:underline">View Details</a>
    </div>

    <div class="products__content block hover:bg-gray-50 transition duration-300">
        <div class="products__team p-4 flex justify-between items-center">
            <div class="products__team-block flex flex-col items-center">
                <img src="{{ $team1->club_image }}" alt="{{ $team1->club_name }}" class="h-20 md:h-32 object-contain">
                <span class="text-sm font-medium text-gray-700">{{ $team1->club_name }}</span>
            </div>
            <div class="text-lg font-bold text-gray-700 opacity-50">
                vs
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ $team2->club_image }}" alt="{{ $team2->club_name }}" class="object-contain h-20 md:h-32">
                <span class="text-sm font-medium text-gray-700">{{ $team2->club_name }}</span>
            </div>
        </div>
        <ul class="border-t border-gray-200 p-4">
            <li class="flex items-center mb-4">
                <img src="https://www.ticketkosta.com/images/soccer.svg" alt="{{ $match->team1 }} vs {{ $match->team2 }}" class="inline-block align-middle mr-2 h-6">
                <span class="text-gray-700">{{ $match->name }}</span>
            </li>
            <li class="flex items-center mb-4">
                <img src="https://www.ticketkosta.com/images/calendar.svg" alt="Date de match" class="inline-block align-middle mr-2 h-6">
                <span class="text-gray-700">{{ $match->date }}, {{ $match->time }}</span>
            </li>
            <li class="flex items-center mb-4">
                <img src="https://www.ticketkosta.com/images/location.svg" alt="Emplacement" class="inline-block align-middle mr-2 h-6">
                <span class="text-gray-700 mr-2">{{ $match->stade->name }}</span>
                
                <a href="{{ $match->stade->emplacement }}" class="modal-open text-blue-500 hover:underline" target="_blank">Voir sur une carte</a>
            </li>
        </ul>
    </div>
    <div class="products__footer flex p-4 items-center justify-center">
        <form method="GET" action="{{ route('matches.show', ['id' => $match->id_match]) }}">
            <x-primary-button type="submit">
                {{ __('Details') }}
            </x-primary-button>
        </form>
        <!-- <form action="{{ route('cart.create', ['id_match' => $match->id_match]) }}" method="POST" class="row mb-3">
            @csrf
            <div class="col-md-6 mb-3">
                <label for="billet_date" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('billet_date') is-invalid @enderror" id="billet_date" name="billet_date" value={{now()}}>
                @error('billet_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="quantity" class="form-label">Jumlah Orang</label>
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="ex: 1" min="0" value="{{old('quantity')}}">
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col">
                <button type="submit" class="btn py-2 btn-primary text-white fw-semibold w-100 d-flex justify-content-center align-items-center gap-2 mb-3">
                    <span>Beli Tiket</span>
                    <i class="bi bi-ticket-fill fs-5"></i>
                </button>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>
        </form> -->
    </div>
</div>