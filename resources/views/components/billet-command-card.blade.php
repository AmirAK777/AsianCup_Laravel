<div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
    <img src="https://static.vecteezy.com/system/resources/previews/024/742/748/original/businessman-hand-buy-ticket-ticket-scalper-symbol-cartoon-illustration-vector.jpg" alt="product-image" class="h-32 w-64 rounded-lg sm:w-40" />

    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
        <div class="mt-5 sm:mt-0">
            <h2 class="text-lg font-bold text-gray-900">Billet pour le match de {{$command->billet->match->name}}</h2>
            <p class="text-sm text-gray-600 mt-2">Quantité : {{$command->billet->quantity}}</p>
            <p class="text-sm text-gray-600 mt-2">Prix unitaire : {{ number_format($command->billet->match->price, 0, ',', '.') }} €</p>
            <p class="text-sm text-gray-600 mt-2">Catégorie : {{$command->billet->category }}</p>
            <p class="text-sm text-gray-600 mt-2">Prix total : {{ number_format($command->total_price, 0, ',', '.') }} €</p>
        </div>
    </div>
    <form action="{{ route('cart.delete', ['id' => $command->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger text-gray">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</form>

</div>
