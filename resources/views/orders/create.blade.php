<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une commande de billets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('commandes.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="buyer_id" class="block font-medium text-sm text-gray-700">ID de l'acheteur :</label>
                        <input type="text" name="buyer_id" id="buyer_id" class="mt-1 p-2 block w-full rounded-md border-gray-300" required>
                    </div>
                    <div class="mt-4">
                        <label for="purchase_date" class="block font-medium text-sm text-gray-700">Date d'achat :</label>
                        <input type="date" name="purchase_date" id="purchase_date" class="mt-1 p-2 block w-full rounded-md border-gray-300" required>
                    </div>
                    <div class="mt-4">
                        <label for="total_price" class="block font-medium text-sm text-gray-700">Prix total :</label>
                        <input type="number" name="total_price" id="total_price" class="mt-1 p-2 block w-full rounded-md border-gray-300" required>
                    </div>
                    <div class="mt-4">
                        <label for="membership" class="block font-medium text-sm text-gray-700">Adhésion :</label>
                        <select name="membership" id="membership" class="mt-1 p-2 block w-full rounded-md border-gray-300" required>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                    <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Créer la commande</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
