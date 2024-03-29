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
                <div class="flex flex-col py-5 rounded-lg border border-solid border-zinc-800 max-w-[382px]" style="background: linear-gradient(180deg, #24242f 0%, #15131d 100%);">
                    @if($billetsRestants > 0)
                    <form action="{{ route('cart.create') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="id_match" value="{{ $match->id_match }}">
                        <input type="hidden" name="billet_date" value="{{ $match->date }}">
                        <div class="flex gap-5 justify-between self-center px-5 w-full max-w-[366px]">
                            <div class="flex flex-col">
                                <img src="{{ $match->team1->club_image}}" alt="Team 1 logo" class="">
                                <p class="mt-2 text-sm font-light tracking-wide leading-4 text-gray-400 capitalize">{{ $match->team1->club_name }}</p>

                            </div>

                            <div class="flex flex-col my-auto leading-[100%]">
                                <div class="text-2xl tracking-tight text-center text-white">3 - 0</div>
                                <div class="justify-center py-1 mt-1.5 text-xs font-light capitalize whitespace-nowrap rounded-sm text-zinc-200">{{ date('d F Y, H:i', strtotime($match->date)) }}</div>
                            </div>
                            <div class="flex flex-col">
                                <img src="{{ $match->team2->club_image}}" alt="Team 1 logo" class="">
                                <p class="mt-2 text-sm font-light tracking-wide leading-4 text-gray-400 capitalize">{{ $match->team1->club_name }}</p>

                            </div>
                        </div>
                        <div class="mt-4 w-full bg-zinc-900 min-h-[1px]" aria-hidden="true"></div>
                        <div class="flex flex-col px-4 mt-5 w-full">
                            <label for="betTitle" class="text-sm font-light tracking-wide leading-4 text-gray-400 capitalize">Nom du Match</label>
                            <div class="flex gap-5 justify-between self-stretch px-4 py-3 mt-4 tracking-wide rounded border border-purple-300 bg-opacity-10  whitespace-nowrap text-zinc-200">
                                <p class="my-auto">{{ $match->name }}</p>
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5" />
                                </svg>
                            </div>
                            <label for="betTitle" class="text-sm font-light tracking-wide leading-4 text-gray-400 capitalize mt-5">Lieu</label>
                            <div class="flex gap-5 justify-between self-stretch px-4 py-3 mt-4 tracking-wide rounded border border-purple-300 bg-opacity-10  whitespace-nowrap text-zinc-200">
                                <p class="my-auto">{{ $match->stade->name }}</p>
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="mt-5 text-sm font-light tracking-wide leading-4 text-zinc-200">Categories</div>
                            <div class="flex gap-4 mt-2 text-sm font-light tracking-wide leading-4 text-orange-300 capitalize whitespace-nowrap">
                                <button type="button" class="flex flex-1 gap-1 px-4 py-3 rounded border border-orange-300 border-solid bg-emerald-600 bg-opacity-10">
                                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/71c921847df8751f5cd826c225c4cd4edecc65fc51992e0d49bbb229ef389dd1?apiKey=97622c207ace4937b2e9a053c7073cf1&" alt="Coin icon" class="shrink-0 w-3.5 aspect-square">
                                    <div class="my-auto">2</div>
                                </button>
                                <div class="flex flex-1 gap-1 px-4 py-3 rounded border border-orange-300 border-solid bg-emerald-600 bg-opacity-10">
                                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/71c921847df8751f5cd826c225c4cd4edecc65fc51992e0d49bbb229ef389dd1?apiKey=97622c207ace4937b2e9a053c7073cf1&" alt="Coin icon" class="shrink-0 w-3.5 aspect-square">
                                    <div class="my-auto">3</div>
                                </div>
                                <div class="flex flex-1 gap-1 px-4 py-3 rounded border border-orange-300 border-solid bg-emerald-600 bg-opacity-10">
                                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/71c921847df8751f5cd826c225c4cd4edecc65fc51992e0d49bbb229ef389dd1?apiKey=97622c207ace4937b2e9a053c7073cf1&" alt="Coin icon" class="shrink-0 w-3.5 aspect-square">
                                    <div class="my-auto">4</div>
                                </div>

                            </div>
                            <div class="flex ">
                                <div class="flex-col m-1 ">
                                    <div class="mt-5 text-sm font-light tracking-wide leading-4 text-zinc-200">Prix</div>
                                    <div class="flex gap-3 mt-1.5">
                                        <div class="flex flex-col  py-2 text-xs whitespace-nowrap rounded border border-solid bg-amber-600 bg-opacity-20 border-amber-600 border-opacity-60  text-zinc-200">
                                            <div class=" px-2 flex gap-1 ">
                                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/eb1ceea50c35572ce7eec9b1f0b250c093ae04bbd60410da4318b7a4016cfd51?apiKey=97622c207ace4937b2e9a053c7073cf1&" alt="Decorative icon" class="shrink-0 w-3 aspect-square" />
                                                <p>{{ $match->price}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-col m-1">
                                    <div class="mt-5 text-sm font-light tracking-wide leading-4 text-zinc-200">Billet resant</div>
                                    <div class="flex gap-3 mt-1.5">
                                        <div class="flex flex-col  py-2 text-xs whitespace-nowrap rounded border border-solid bg-amber-600 border-green-600 border-solid bg-green-600 bg-opacity-20 text-zinc-200" w-[60px]">
                                            <div class=" px-2 flex gap-1 ">
                                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/eb1ceea50c35572ce7eec9b1f0b250c093ae04bbd60410da4318b7a4016cfd51?apiKey=97622c207ace4937b2e9a053c7073cf1&" alt="Decorative icon" class="shrink-0 w-3 aspect-square" />
                                                <p>{{$billetsRestants}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 text-sm font-light tracking-wide leading-4 text-zinc-200 justify-center">Quantité</div>
                            <div class="flex gap-3 mt-1.5">
                                <input for="quantity" id="quantity" name="quantity" placeholder="ex: 1" min="0" class="rounded border border-orange-300 border-solid bg-emerald-600 bg-opacity-10 text-amber-600" required>
                                <div class="px-2 flex gap-1 mt-2 text-amber-600">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-5 text-sm font-light tracking-wide leading-4 text-zinc-200 justify-center">Categorie</div>
                            <div class="flex gap-3 mt-1.5">
                                <input for="category" id="category" name="category" placeholder="ex: 1" min="0" class="rounded border border-orange-300 border-solid bg-emerald-600 bg-opacity-10 text-amber-600" required>
                                <div class="px-2 flex gap-1 mt-2 text-amber-600">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                    </svg>
                                </div>
                            </div>
                            <button type="submit" class=" m-1flex justify-center px-8 py-3.5 mt-4 capitalize rounded-sm border border-sky-600 border-solid bg-blue-400 bg-opacity-20">
                                <span class="grow text-sm tracking-wide capitalize text-zinc-200">Acheter</span>
                            </button>
                        </div>
                    </form>
                    @else
                    <p>Désolé, il n'y a plus de billets disponibles pour ce match.</p>
                    @endif
                </div>


</x-app-layout>