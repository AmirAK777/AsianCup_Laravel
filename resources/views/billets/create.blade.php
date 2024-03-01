<!-- resources/views/billets/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un Billet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('billets.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="id_match" class="block text-gray-700 text-sm font-bold mb-2">Match:</label>
                        <select name="id_match" id="id_match" class="form-select rounded-md shadow-sm mt-1 block w-full">
                            @foreach($matches as $match)
                            <option value="{{ $match->id_match }}">{{ $match->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Catégorie:</label>
                        <input type="text" name="category" id="category" class="form-input rounded-md shadow-sm mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Prix:</label>
                        <input type="number" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantité:</label>
                        <input type="number" name="quantity" id="quantity" class="form-input rounded-md shadow-sm mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="availability" class="block text-gray-700 text-sm font-bold mb-2">Disponibilité:</label>
                        <select name="availability" id="availability" class="form-select rounded-md shadow-sm mt-1 block w-full">
                            <option value="1">Disponible</option>
                            <option value="0">Non disponible</option>
                        </select>
                    </div>


                    <div class="mb-4">
                        <x-primary-button type="submit">
                            {{ __('CREATE') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>