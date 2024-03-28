<!-- Affichage des billets en vente -->
@foreach($sellableBillets as $billet)
    <div class="bg-white overflow-hidden shadow rounded-lg border mb-4">
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        ID du Billet
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span>{{ $billet->billet_id }}</span>
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nom du Match
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span>{{ $billet->match->name }}</span>
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nombre de Places
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span>{{ $billet->quantity }}</span>
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Statut
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="@if($billet->status)text-success @else text-danger @endif">{{ $billet->status ? "Actif" : "Déjà Utilisé" }}</span>
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Action
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <form action="{{ route('billet.buy', ['id' => $billet->billet_id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Acheter</button>
                        </form>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
@endforeach
