<div class="scale-100 p-6 bg-white rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
    <div class="flex justify-between items-center w-full">
        <div class="flex items-center"> <!-- Ajout de la classe flex et items-center ici -->
            <div class="mr-4"> <!-- Ajout de la classe mr-4 pour espacer le contenu -->
                <div class="flex items-center"> <!-- Contenu aligné horizontalement -->
                    <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                        <img src="{{ $team1->club_image }}" alt="{{ $team1->club_name }}">
                    </div>
                    <span class="ml-2">{{ $team1->club_name }}</span>
                </div>
            </div>
            <div>
                <span class="text-4xl font-bold mx-4">vs</span>
            </div>
            <div class="ml-4"> <!-- Ajout de la classe ml-4 pour espacer le contenu -->
                <div class="flex items-center justify-end"> <!-- Contenu aligné horizontalement -->
                    <span>{{ $team2->club_name }}</span>
                    <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full ml-2">
                        <img src="{{ $team2->club_image }}" alt="{{ $team2->club_name }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="info flex flex-col justify-end"> <!-- Ajout des classes flex, flex-col et justify-end pour aligner en bas et en colonne -->
            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-dark">{{ $match->name }}</h2>
            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-dark">{{ $match->date }}</h2>
            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-dark">{{ $stade->name }}</h2>
        </div>
    </div>
</div>
