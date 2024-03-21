<div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="border-t border-gray-200">

        <dl class="divide-y divide-gray-200">
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Nom du Match
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="font-semibold">{{$match->name}}</span>
                </dd>
            </div>

            <!-- Ici, je rajoute des classes pour la couleur de fond et le padding -->
            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50">
                <dt class="text-sm font-medium text-gray-500">
                    Nombre de place
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span>{{$billet->quantity}} Personnes</span>
                </dd>
            </div>

            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Statut
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="{{$billet->status ? 'text-green-600' : 'text-red-600'}}">
                        {{$billet->status ? "Actif" : "Déjà Utilisé"}}
                    </span>
                </dd>
            </div>
            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Stade
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$match->stade->name}}
                </dd>
            </div>
            <a class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{route('billet.download', ['id' => $billet->billet_id])}}"><i class="bi bi-download me-2"></i>Telecharger</a>

        </dl>
    </div>
</div>

<style>
/* Ajoutez ce style si ce n'est pas déjà fait dans vos styles globaux */
.font-semibold { font-weight: 600; }
.text-green-600 { color: #16a34a; }
.text-red-600 { color: #dc2626; }
.bg-gray-50 { background-color: #f9fafb; }
</style>