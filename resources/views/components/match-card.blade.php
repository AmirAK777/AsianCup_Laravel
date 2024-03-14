<div class="products__item rounded-lg bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto max-w-md">
    <div class="products__header p-4 h-14 flex items-center justify-center">
        <h2 class="text-lg font-bold text-gray-800">{{ $match->name }}</h2>
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
            <div class="products__team-block flex flex-col items-center">
                <img src="{{ $team2->club_image }}" alt="{{ $team2->club_name }}" class="h-20 md:h-32 object-contain">
                <span class="text-sm font-medium text-gray-700">{{ $team2->club_name }}</span>
            </div>
        </div>
        <ul class="products__item-info p-4 border-t border-gray-200">
            <li class="mb-4 flex items-center">
                <img src="https://www.ticketkosta.com/images/soccer.svg" alt="{{ $match->team1 }} vs {{ $match->team2 }}" class="h-6 inline-block align-middle mr-2">
                <span class="text-gray-700">{{ $match->name }}</span>
            </li>
            <li class="mb-4 flex items-center">
                <img src="https://www.ticketkosta.com/images/calendar.svg" alt="Date de match" class="h-6 inline-block align-middle mr-2">
                <span class="text-gray-700">{{ $match->date }}, {{ $match->time }}</span>
            </li>
            <li class="mb-4 flex items-center">
                <img src="https://www.ticketkosta.com/images/location.svg" alt="Emplacement" class="h-6 inline-block align-middle mr-2">
                <span class="text-gray-700">{{ $match->stade->name }}</span>
            </li>
        </ul>
    </div>
    <div class="products__footer flex p-4 items-center justify-center">
        <form method="GET" action="{{ route('matches.show', ['id' => $match->id_match]) }}">
            <x-primary-button type="submit">
                {{ __('Details') }}
            </x-primary-button>
        </form>
        <form action="{{ route('cart.create', ['id_match' => $match->id_match]) }}" method="POST" class="row mb-3">
            @csrf
            <!-- Vos autres champs de formulaire ici -->
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
        </form>
    </div>
</div>