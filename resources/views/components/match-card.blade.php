<div class="products__item rounded-lg bg-white overflow-hidden shadow-sm sm:rounded-lg mx-auto" style="max-width: 300px;">
    <div class="products__header p-4 h-14 flex"></div>

    <a href="/fr/Premier-league-d-angleterre/{{ $match->slug }}/" class="products__content">
        <div class="products__team mb-8 p-4 flex justify-between items-start h-32">
            <div class="products__team-block flex flex-col font-medium text-center items-center flex-none w-32">
                <img src="{{ $team1->club_image }}" alt="{{ $team1->club_name }}" class="h-20 md:h-32">
                {{ $team1->club_name }}
            </div>
            <div class="text-lg font-bold text-gray-700 opacity-35 flex-shrink-0 w-10 self-center">
                vs
            </div>
            <div class="products__team-block flex flex-col font-medium text-center items-center flex-none w-32">
                <img src="{{ $team2->club_image }}" alt="{{ $team2->club_name }}" class="h-20 md:h-32">
                {{ $team2->club_name }}
            </div>
        </div>
        <ul class="products__item-info p-4 mb-6">
            <li class="mb-4 font-medium flex items-start h-32">
                <img src="https://www.ticketkosta.com/images/soccer.svg" alt="{{ $match->team1 }} vs {{ $match->team2 }}" class="h-6 inline-block align-middle">
                <span class="md:hidden inline-block ml-2">
                    {{ $match->name }}
                </span>
            </li>
            <li class="mb-4 font-medium flex items-start h-32">
                <img src="https://www.ticketkosta.com/images/calendar.svg" alt="Date de match" class="h-6 inline-block align-middle">
                <span class="md:hidden inline-block ml-2">

                    {{ $match->date }}, {{ $match->time }}
                </span>

            </li>
            <li class="mb-4 font-medium flex items-start h-32">
                <img src="https://www.ticketkosta.com/images/location.svg" alt="Emplacement" class="h-6 inline-block align-middle">
                <span class="md:hidden inline-block ml-2">

                    {{ $match->stade->name }}
                </span>

            </li>
        </ul>
    </a>
    <div class="products__footer flex px-4 pb-7 items-center"> <!-- Réduction de l'espacement horizontal -->
        <a href="/fr/Premier-league-d-angleterre/{{ $match->slug }}/" class="btn bg-cyan-500 text-white rounded-full px-6 py-3 font-medium mr-5">
            Voir les billets
        </a>
        <a class="products__like text-gray-600 text-2xl hover:text-red-500" href="#" data-item="{{ $match->id }}" data-action="add" data-additional="inlist">
            <i class="far fa-heart"></i>
        </a>
    </div>
</div>