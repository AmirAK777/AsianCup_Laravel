<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EasyTrip | '.$command->match->name) }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row mb-3">
            <!-- <a href="{{route('product.index')}}">< Retour à la réservation de billets</a> -->
        </div>
        <div class="row row-cols-1 row-cols-md-2 justify-content-center align-matchs-start mb-4">
            <div class="col-md-6 mb-3">
                @if(file_exists(public_path().'\storage/'.$command->match->image))
                    <img src={{asset('storage/'.$command->match->image)}} alt="" class="w-100 rounded shadow-sm" style="aspect-ratio: 16 / 10; object-fit: cover;">
                @else
                    <img src={{$command->match->image}} alt="" class="w-100 rounded shadow-sm" style="aspect-ratio: 16 / 10; object-fit: cover;">
                @endif
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column mb-4">
                    <div class="display-6 playfair fw-bold mb-3">{{$command->match->name}}</div>
                    <p class="text-muted">{!! $command->match->description !!}</p>
                    <div class="card py-2">
                        <div class="card-body d-flex justify-content-center gap-3">
                            <div class="d-flex gap-2">
                                <i class="bi bi-geo-alt-fill text-primary"></i>
                                <span>{{$command->match->location}}</span>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex gap-2">
                                <i class="bi bi-people-fill text-primary"></i>
                                <span>{{$command->match->testimonies->count()}} Avis</span>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex flex-column-md gap-2">
                                <i class="bi bi-star-fill text-primary"></i>
                                <span>{{$command->match->avg_rating > 0 ? number_format($command->match->avg_rating,2)."/5.00" : "Pas de notes"}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column mb-4">
                    <div class="display-6 playfair fw-bold mb-3">Prix du billet</div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="d-flex">
                                    <h4 class="fw-semibold">EURO {{number_format($command->match->price,0,',','.')}}</h4>
                                    <span class="text-muted">/Personne</span>
                                </div>
                                <p class="{{$command->match->status ? 'text-success' : 'text-danger'}} mb-0">{{$command->match->status ? 'Billets disponibles' : 'Billets épuisés'}}</p>
                            </div>
                            <form action="{{route('command.update', ['id' => $command->id])}}" method="POST" class="row mb-3">
                                @method('PUT')
                                @csrf
                                <div class="col-md-6 mb-3">
                                    <label for="ticket-date" class="form-label">Date</label>
                                    <input type="date" class="form-control @error('billet_date') is-invalid @enderror" id="ticket-date" name="billet_date" value={{$command->billet_date}}>
                                    @error('billet_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="form-label">Nombre de personnes</label>
                                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="ex: 1" min="0" value="{{$command->quantity}}">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn py-2 btn-primary text-white fw-semibold w-100">
                                        Modifier la commande
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
