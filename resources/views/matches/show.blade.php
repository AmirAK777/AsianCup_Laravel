
@php
    $billetsRestants = $billetsRestants; // Cette variable représente le nombre de billets restants.
    $totalPlaces = $totalPlaces; // Cette variable représente le nombre total de billets disponibles.
    $pourcentageRestant = ($billetsRestants / $totalPlaces) * 100;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Match Details') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="flex-1 px-4">
                <div x-data="{ image: 1, images: ['{{$match->match_image}}', '{{$match->match->stade->graph_image}}'] }" x-cloak>
                    <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                        <div x-show="image === 1" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <img class="max-h-full max-w-full" :src="images[0]" alt="Description de l'image">
                        </div>

                        <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <img class="max-h-full max-w-full" :src="images[1]" alt="Description de l'image">
                        </div>

                        <!-- <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <img class="max-h-full max-w-full" :src="images[2]" alt="Description de l'image">
                        </div>

                        <div x-show="image === 4" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                            <img class="max-h-full max-w-full" :src="images[3]" alt="Description de l'image">
                        </div> -->
                    </div>

                    <div class="md:flex md:-mx-2 mb-4">
                        <template x-for="i in 2">
                            <div class="flex-1 px-2">
                                <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                    <img :src="images[i-1]" alt="Description de l'image" class="max-h-full max-w-full">
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <div class="flex justify-between items-center mb-6">
                    <img src="{{ $match->team1->club_image}}" alt="Benfica" class="h-20">
                    <div class="text-center">
                        <h1 class="text-4xl font-bold text-gray-800 mb-2 flex items-center justify-center">
                            <span>{{ $match->team1->club_name }}</span>
                            <span class="text-gray-600 mx-5">vs</span> <!-- Ajoute une marge horizontale autour du "vs" -->
                            <span>{{ $match->team2->club_name }}</span>
                        </h1>
                        <div id="countdown" class="text-center my-4 p-4 border rounded-lg bg-blue-100 dark:bg-blue-900 dark:border-blue-800">
  <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-gray-100">Le match commence dans :</h3>
  <div id="time" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">00:00:00</div>
</div>


                        <p class="text-md text-gray-600">{{ date('d F Y, H:i', strtotime($match->date)) }}</p>
                    </div>
                    <img src="{{ $match->team2->club_image }}" alt="Inter" class="h-20">
                </div>
                <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{ $match->name }}</h2>
                <p class="text-gray-500 text-sm">Lieu : <a href="#" class="text-indigo-600 hover:underline"> {{ $match->stade->name }}</a></p>
                @if(session('status'))
    <div class="alert alert-success text-green-500">
        {{ session('status') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="flex items-center space-x-4 my-4">
                    <div>
                        <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                            <span class="text-indigo-400 mr-1 mt-1">€</span>
                            <span class="font-bold text-indigo-600 text-3xl">{{ $match->price}}</span>
                        </div>
                        
                    </div>
                </div>
                <div class="flex items-center space-x-4 my-4">
                    <div>
                        <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                            <span class="text-indigo-400 mr-1 mt-1">Nombre de billet restant : </span>
                            <span class="font-bold text-indigo-600 text-3xl">{{ $billetsRestants}}</span>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="text-center my-4">
    @if($pourcentageRestant == 0)
        <p class="text-xl text-red-600 font-semibold">Tous les billets ont été vendus.</p>
    @elseif($pourcentageRestant <= 5)
        <p class="text-xl text-red-600 font-semibold">Ce sont les toutes dernières places pour ce match !</p>
    @elseif($pourcentageRestant <= 25)
        <p class="text-xl text-red-600 font-semibold">Il ne reste plus beaucoup de places pour ce match, prenez vite la votre !</p>
    @elseif($pourcentageRestant <= 50)
        <p class="text-xl text-red-600 font-semibold">La moitié des billets ont déjà été vendus !</p>
    @endif
</div>
                <div class="mb-4">
                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $pourcentageRestant }}%"></div>
    </div>
    <div class="text-right">
        <span class="text-sm font-semibold text-gray-700">Billets restants: {{ $billetsRestants }} / {{ $totalPlaces }}</span>
    </div>
</div>
                @if($billetsRestants > 0)
                <form action="{{ route('cart.create') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="id_match" value="{{ $match->id_match }}">
                    <input type="hidden" name="billet_date" value="{{ $match->date }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantité :</label>
                            <input type="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="quantity" name="quantity" placeholder="ex: 1" min="0" value="{{ old('quantity') }}">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="block text-sm font-medium text-gray-700">Catégorie :</label>
                            <select id="category" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Ajouter au panier</button>
                </form>
                @else
                <p>Désolé, il n'y a plus de billets disponibles pour ce match.</p>
                @endif
            </div>
        </div>
        
    <x-comments></x-comments>
    </div>
    <script>
  // Assurez-vous de convertir la date du match de PHP à JavaScript.
  var countDownDate = new Date("{{ $match->date }}").getTime();

  // Mettez à jour le compteur toutes les secondes.
  var countdownFunction = setInterval(function() {
    // Obtenez la date et l'heure actuelles.
    var now = new Date().getTime();
    
    // Trouvez la distance entre maintenant et la date du compte à rebours.
    var distance = countDownDate - now;
    
    // Calculs de temps pour les jours, heures, minutes et secondes.
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Affichez le résultat dans l'élément avec l'id="time".
    document.getElementById("time").innerHTML = days + "j " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // Si le compteur est terminé, écrivez du texte.
    if (distance < 0) {
      clearInterval(countdownFunction);
      document.getElementById("time").innerHTML = "Le match a commencé!";
    }
  }, 1000);
</script>

<style>
  #countdown {
    background-color: #ebf8ff; /* Couleur de fond claire pour le mode clair */
    color: #1a202c; /* Couleur de texte foncée pour le mode clair */
    border: 2px solid #bee3f8; /* Couleur de la bordure légèrement plus foncée que le fond */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre douce pour la profondeur */
    border-radius: 0.5rem; /* Bords arrondis */
    padding: 1rem; /* Espace intérieur */
    display: inline-block; /* Pour centrer le bloc dans la page */
    margin-top: 2rem; /* Espace au-dessus */
    margin-bottom: 2rem; /* Espace en dessous */
  }

  #time {
    letter-spacing: 0.1em; /* Espace entre les caractères */
  }

  @media (prefers-color-scheme: dark) {
    #countdown {
      background-color: #2a4365; /* Couleur de fond pour le mode sombre */
      color: #e2e8f0; /* Couleur de texte pour le mode sombre */
      border-color: #2c5282; /* Couleur de bordure pour le mode sombre */
    }
  }
</style>

</x-app-layout>