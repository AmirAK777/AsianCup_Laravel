<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($matches as $match)
                    <x-match-card :team1="$match->team1" :team2="$match->team2" :match="$match" :stade="$match->stade" :image="$match->stade->image_stade" />

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>