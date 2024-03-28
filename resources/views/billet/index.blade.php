<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Billets') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-green-200 text-green-800 px-6 py-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">


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

    </div>

</x-app-layout>