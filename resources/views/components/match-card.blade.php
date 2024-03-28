<div class="rounded-3xl xl:p-10 bg-white shadow-md ">
    <div class="products__header p-6 bg-custom-black text-white">
        <h2 class="text-lg font-semibold leading-8 text-gray-900 text-center">{{ $match->name }}</h2>
    </div>
    <div class="flex justify-around items-center py-6">
        <img src="{{ $team1->club_image }}" alt="{{ $team1->club_name }}" class="h-24 object-contain">
        <span class="text-3xl font-bold text-gray-600">VS</span>
        <img src="{{ $team2->club_image }}" alt="{{ $team2->club_name }}" class="h-24 object-contain">
    </div>
    <ul role="list" class="mt-8 space-y-3 text-sm leading-6 xl:mt-10">
        <li class="flex gap-x-3">
            <img src="https://www.ticketkosta.com/images/calendar.svg" alt="Location" class="h-6 mr-2">
            <span>{{ $match->date }}</span>
        </li>
        <li class="flex gap-x-3">
            <img src="https://www.ticketkosta.com/images/soccer.svg" alt="Soccer" class="h-6 mr-2">
            <span>{{ $match->date }} - {{ $match->time }}</span>
        </li>
        <li class="flex gap-x-3">
            <img src="https://www.ticketkosta.com/images/location.svg" alt="Location" class="h-6 mr-2">
            <span>{{ $match->stade->name }}</span>
        </li>
    </ul>
    <div class="products__footer p-6 flex justify-center">
        <form method="GET" action="{{ route('matches.show', ['id' => $match->id_match]) }}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                {{ __('Voir les billets') }}
            </button>
        </form>
    </div>
</div>
