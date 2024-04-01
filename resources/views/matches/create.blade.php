<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('matches.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="name" class="block text-gray-700 text-sm font-bold mb-2">Match Name:</x-input-label>
                        <x-text-input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="date" class="block text-gray-700 text-sm font-bold mb-2">Match Date:</x-input-label>
                        <x-text-input type="date" name="date" id="date" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="price" class="block text-white text-sm font-bold mb-2">Prix :</x-input-label>
                        <input type="number" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full bg-gray-900 text-white border border-gray-600 focus:border-gray-500 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <x-input-label for="status" class="block text-gray-700 text-sm font-bold mb-2">Statut:</x-input-label>
                        <select name="status" id="status" class="form-select dark:text-gray-300 rounded-md shadow-sm mt-1 bg-gray-900  block w-full">
                            <option class="dark:text-gray-300" value="1">Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="stade" class="block text-gray-700 text-sm font-bold mb-2">Stadium:</x-input-label>
                        <select name="stade_id" id="stade" class="form-select dark:text-gray-300 rounded-md shadow-sm mt-1 bg-gray-900  block w-full">
                            @foreach($stades as $stade)
                            <option value="{{ $stade->id_stade }}">{{ $stade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="team1" class="block text-gray-700 text-sm font-bold mb-2">Team 1:</x-input-label>
                        <select name="team1_id" id="team1" class="form-select dark:text-gray-300 rounded-md shadow-sm mt-1 bg-gray-900  block w-full">
                            @foreach($teams as $team)
                            <option value="{{ $team->id_team }}">{{ $team->club_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="team2" class="block text-gray-700 text-sm font-bold mb-2">Team 2:</x-input-label>
                        <select name="team2_id" id="team2" class="form-select dark:text-gray-300 rounded-md shadow-sm mt-1 bg-gray-900  block w-full">
                            @foreach($teams as $team)
                            <option value="{{ $team->id_team }}">{{ $team->club_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="match_image" class="block font-medium text-sm text-gray-700">URL de l'image :</x-input-label>
                        <x-text-input type="url" name="match_image" id="match_image" class="form-input rounded-md shadow-sm mt-1 block w-full" />

                        @error('match_image')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <x-primary-button type="submit">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>