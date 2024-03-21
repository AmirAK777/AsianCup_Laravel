<!-- resources/views/orders/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Passer une commande pour ') }} {{ $match->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('order.submit', $match->id) }}">
                        @csrf

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantité de billets</label>
                            <input type="number" name="quantity" id="quantity" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm @error('quantity') border-red-500 @enderror" value="{{ old('quantity') }}" required autofocus>
                            @error('quantity')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ajoutez d'autres champs au besoin -->

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Passer la commande') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
