<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Stade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
                @endif
                <form method="POST" action="{{ route('stades.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="cty" class="block text-gray-700 text-sm font-bold mb-2">City:</label>
                        <input type="text" name="cty" id="cty" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location du stade :</label>
                        <input type="url" name="location" id="location" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="graph_image" class="block text-gray-700 text-sm font-bold mb-2">Graphe du Stade :</label>
                        <input type="text" name="graph_image" id="graph_image" class="form-input rounded-md shadow-sm mt-1 block w-full">
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Nombre de places:</label>
                        <input type="number" name="place" id="place" class="form-input rounded-md shadow-sm mt-1 block w-full">
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