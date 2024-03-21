<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vérification de la commande') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="overflow-y-auto max-h-[85vh]">
                @foreach ($commands as $command)
                @include('components.cart-card', array(
                'command' => $command,
                'match' => $command->match
                ))
                @endforeach
            </div>
            <div class="overflow-y-auto max-h-[85vh]">
                @if($commands->count() > 0)
                <div class="bg-white shadow rounded p-6">
                    <h2 class="text-2xl font-semibold mb-4">Détails du paiement</h2>
                    <div class="space-y-2">
                        @foreach ($commands as $command)
                        <div class="flex justify-between">
                            <div>{{$command->match->name}}</div>
                            <div><span>{{$command->quantity}}</span>x<span>{{number_format($command->match->price,0,',','.')}}</span></div>
                        </div>
                        @endforeach
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between">
                        <h4 class="font-semibold">Sous-total</h4>
                        <span class="font-semibold">EURO {{ number_format($commands->sum(function($command) { return $command->match->price * $command->quantity; }), 0, ',', '.') }}</span>
                    </div>
                    <form action="{{route('transaction.create')}}" method="POST" class="mt-6">
                        @csrf
                        <div class="space-y-2">
                            <input class="form-checkbox" type="checkbox" value="1" id="terms_check" name="terms_check" required>
                            <label class="text-sm" for="terms_check"> Je suis d'accord avec les termes et conditions</label>
                        </div>
                        <button type="submit" class="bg-gray-800 text-white font-semibold px-4 py-2 w-full mt-4 flex items-center justify-center">
                            <span class="me-2">Payer</span>
                            <i class="bi bi-credit-card-fill"></i>
                        </button>
                    </form>
                </div>
                @else
                <div class="text-2xl font-semibold">
                    Il n'y a pas encore de commande dans votre panier, passez une commande maintenant <a href="{{route('matches.store')}}" class="text-blue-500">ici.</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
