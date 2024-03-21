<div class="products__item rounded-lg bg-white overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out mx-auto max-w-lg">
    <div class="products__header p-6 bg-custom-black text-white">
        <h2 class="text-xl font-bold">{{ $match->name }}</h2>
    </div>
    <style>
    .bg-custom-black {
  background-color: #333; /* Un noir assombri pour moins d'intensité */
  color: #fff; /* Texte blanc pour contraster avec le fond sombre */
}
    </style>
    <div class="products__content">
        <div class="p-6 flex justify-around items-center">
            <!-- Team 1 -->
            <div class="flex flex-col items-center">
                <img src="{{ $team1->club_image }}" alt="{{ $team1->club_name }}" class="h-24 object-contain mb-2">
                <span class="text-sm font-semibold">{{ $team1->club_name }}</span>
            </div>

            <div class="text-2xl font-bold text-gray-600">VS</div>

            <!-- Team 2 -->
            <div class="flex flex-col items-center">
                <img src="{{ $team2->club_image }}" alt="{{ $team2->club_name }}" class="h-24 object-contain mb-2">
                <span class="text-sm font-semibold">{{ $team2->club_name }}</span>
            </div>
        </div>

        <ul class="p-6 border-t border-gray-200">
            <li class="mb-4 flex items-center">
                <img src="https://www.ticketkosta.com/images/soccer.svg" alt="Soccer" class="h-6 mr-2">
                <span class="text-gray-800">{{ $match->name }}</span>
            </li>
            <li class="mb-4 flex items-center">
                <img src="https://www.ticketkosta.com/images/calendar.svg" alt="Calendar" class="h-6 mr-2">
                <span class="text-gray-800">{{ $match->date }}, {{ $match->time }}</span>
            </li>
            <li class="mb-4 flex items-center">
                <img src="https://www.ticketkosta.com/images/location.svg" alt="Location" class="h-6 mr-2">
                <span class="text-gray-800">{{ $match->stade->name }}</span>
            </li>
        </ul>
    </div>

    <div class="products__footer bg-gray-100 p-6 flex justify-center">
        <form method="GET" action="{{ route('matches.show', ['id' => $match->id_match]) }}">
            <button type="submit" class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-full transition-colors duration-300">
                {{ __('Details') }}
            </button>
        </form>
    </div>
</div>
