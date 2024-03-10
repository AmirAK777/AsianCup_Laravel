<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une équipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('teams.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="club_name" class="block font-medium text-sm text-gray-700">Nom du club :</label>
                            <input type="text" id="club_name" name="club_name" value="{{ old('club_name') }}" required class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @error('club_name')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="club_image" class="block font-medium text-sm text-gray-700">URL de l'image :</label>
                            <input type="url" id="club_image" name="club_image" value="{{ old('club_image') }}" required class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @error('club_image')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <x-primary-button type="submit">Créer</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
