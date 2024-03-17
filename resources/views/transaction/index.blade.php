<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Histori Transaksi
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="display-6 playfair fw-bold text-center mb-3">
            Histori Transaksi
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center gap-4">
            @if($transactions->count() > 0)
                @foreach ($transactions as $transaction)
                    <div class="col-md-6 mb-3">
                        @include('components.transaction-card', [
                            'transaction' => $transaction,
                            'transaction_details' => $transaction->details
                        ])
                    </div>
                @endforeach
            @else
                <h5 class="text-muted text-center">Belum ada histori transaksi.</h5>
            @endif
        </div>
    </div>
</x-app-layout>
