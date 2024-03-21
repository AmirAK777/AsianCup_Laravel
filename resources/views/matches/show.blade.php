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
                        <p class="text-md text-gray-600">{{ date('d F Y, H:i', strtotime($match->date)) }}</p>
                    </div>
                    <img src="{{ $match->team2->club_image }}" alt="Inter" class="h-20">
                </div>
                <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{ $match->name }}</h2>
                <p class="text-gray-500 text-sm">Lieu : <a href="#" class="text-indigo-600 hover:underline"> {{ $match->stade->name }}</a></p>

                <div class="flex items-center space-x-4 my-4">
                    <div>
                        <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                            <span class="text-indigo-400 mr-1 mt-1">$</span>
                            <span class="font-bold text-indigo-600 text-3xl">{{ $match->price}}</span>
                        </div>
                    </div>
                </div>
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
                            <select id="category" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="1">Catégorie 1</option>
                                <option value="2">Catégorie 2</option>
                                <option value="3">Catégorie 3</option>
                                <option value="4">Catégorie 4</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Acheter</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>