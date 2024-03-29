<article class="flex flex-col grow p-6 mx-auto w-full text-xs bg-gray-900 rounded-lg max-md:px-5 max-md:mt-4" style="background-color: #130D25;">

    <div class="flex gap-5 justify-between w-full text-white text-opacity-60">
        <div class="flex gap-2 capitalize">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f0b00e140435228bea81e21e8b2084e66771dfef66d69f2ff5ee433d72cddf98?apiKey=97622c207ace4937b2e9a053c7073cf1&" alt="Premier League logo" class="shrink-0 w-5 aspect-[1.25]" />
            <p>{{ $match->name }}</p>
        </div>
        <time datetime="2023-02-02T00:00">{{ $match->date }}</time>
    </div>
    <div class="flex gap-5 justify-between mt-6 text-sm font-semibold text-white whitespace-nowrap">
        <div class="flex flex-col">
            <img loading="lazy" src="{{ $team1->club_image }}" alt="Chelsea logo" class="h-10 w-10 aspect-square" />
            <p class="mt-2">{{ $team1->club_name }}</p>
        </div>
        <p class="my-auto text-xs text-white text-opacity-60">VS</p>
        <div class="flex flex-col">
            <img loading="lazy" src="{{ $team2->club_image }}" alt="Liverpool logo" class="self-end h-10 w-10 aspect-square" />
            <p class="mt-2">{{ $team2->club_name }}</p>
        </div>
    </div>
    <div class="flex gap-4 mt-6 whitespace-nowrap justify-center">
        <div class="flex flex-1 gap-4 justify-center px-4 py-2 bg-gray-800 rounded">
            <p class="text-white text-opacity-60">1</p>
            <p class="font-semibold text-white">1.87</p>
        </div>
        <form method="GET" action="{{ route('matches.show', ['id' => $match->id_match]) }}">
            <x-primary-button type="submit">
                {{ __('Details') }}
            </x-primary-button>
        </form>

        <div class="flex flex-1 gap-4 justify-center px-4 py-2 bg-gray-800 rounded">
            <p class="text-white text-opacity-60">2</p>
            <p class="font-semibold text-white">1.87</p>
        </div>

    </div>
</article>