<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Billets') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">


            @if($billets->count() > 0)
            @foreach ($billets as $billet)
            <div class="col-md-6 mb-5">
                @include('components.billet-card', [
                'billet' => $billet,
                'match' => $billet->match
                ])
            </div>
            @endforeach
            @else
            <p class="text-muted text-center fs-5">Aucun billet réservé pour le moment.</p>
            @endif
        </div>

    </div>

</x-app-layout>