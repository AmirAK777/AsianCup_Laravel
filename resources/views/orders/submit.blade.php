<!-- resources/views/orders/submit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmation de commande') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Votre commande a été soumise avec succès !</p>
                    <p>Un email de confirmation vous sera envoyé bientôt.</p>
                    <a href="{{ route('dashboard') }}" class="underline text-sm text-gray-600 hover:text-gray-900">Retour au tableau de bord</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
