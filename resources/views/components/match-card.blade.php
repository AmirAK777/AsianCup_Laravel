<div class="products__item rounded-lg bg-white overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out mx-auto max-w-lg"> <!-- Notez le changement ici max-w-md à max-w-lg -->
    <div class="products__header p-6 bg-custom-black text-white">
        <h2 class="text-xl font-bold text-center">{{ $match->name }}</h2>
    </div>
    <div class="flex justify-around items-center py-6">
        <img src="{{ $team1->club_image }}" alt="{{ $team1->club_name }}" class="h-24 object-contain">
        <span class="text-3xl font-bold text-gray-600">VS</span>
        <img src="{{ $team2->club_image }}" alt="{{ $team2->club_name }}" class="h-24 object-contain">
    </div>
    <div class="px-6 py-4">
        <div class="flex items-center text-gray-700 mb-2">
            <img src="https://www.ticketkosta.com/images/soccer.svg" alt="Soccer" class="h-6 mr-2">
            <span>{{ $match->date }} - {{ $match->time }}</span>
        </div>
        <div class="flex items-center text-gray-700">
            <img src="https://www.ticketkosta.com/images/location.svg" alt="Location" class="h-6 mr-2">
            <span>{{ $match->stade->name }}</span>
        </div>
    </div>
    <div class="products__footer bg-gray-100 p-6 flex justify-center">
        <form method="GET" action="{{ route('matches.show', ['id' => $match->id_match]) }}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                {{ __('Voir les billets') }}
            </button>
        </form>
    </div>
</div>

<style>
.bg-custom-black {
        background-color: #333; /* Un noir assombri pour moins d'intensité */
        color: #fff; /* Texte blanc pour contraster avec le fond sombre */
    }
    /* Vous pouvez également ajouter un style personnalisé pour contrôler la taille */
    .products__item {
        width: 80%; /* ou vous pouvez utiliser des pixels, par exemple width: 500px; */
        max-width: 36rem; /* Cela définit la largeur maximale. Ajustez cette valeur comme vous le souhaitez. */
    }
</style>
