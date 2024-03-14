<div class="mx-auto max-w-md rounded-lg bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="flex items-center justify-between p-4 h-14 bg-gray-100">
        <h2 class="text-lg font-bold text-gray-800">Match Details</h2>
        <a href="{{ $match->slug }}/" class="text-blue-500 hover:underline">View Details</a>
    </div>
    
    <a href="{{ $match->slug }}/" class="block transition duration-300 hover:bg-white">
        <div class="flex justify-between items-center p-4">
            <div class="flex flex-col items-center">
                <img src="{{ $team1->club_image }}" alt="{{ $team1->club_name }}" class="object-contain h-20 md:h-32">
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
        <img src="{{ $match->stade->image_stade }}" class="w-full h-auto">
 
        
    </a>
    <div class="flex p-4 items-center justify-center bg-white">
        <x-primary-button>
            {{ __('Voir les billets') }}
        </x-primary-button>
    </div>
</div>


       
