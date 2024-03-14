<div class="products__item rounded-lg bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto max-w-md">
    <div class="products__header p-4 h-14 flex items-center justify-center">
        <h2 class="text-lg font-bold text-gray-800">{{ $match->name }}</h2>
    </div>

    <a href="{{ $match->slug }}/" class="products__content block hover:bg-gray-50 transition duration-300">
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
    </a>
    <div class="products__footer flex p-4 items-center justify-center">
        <x-primary-button>
            {{ __('Register') }}
        </x-primary-button>
    </div>
</div>
