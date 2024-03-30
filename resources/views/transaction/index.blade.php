<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Historique des Transactions
        </h2>
    </x-slot>

    <div class="flex flex-col justify-center items-center pt-4">
        <div class="relative flex flex-col rounded-[10px] border-[1px] border-gray-200 w-[576px] mx-auto p-4 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800  dark:shadow-none" style=" background: linear-gradient(136deg, #1a2028 3.36%, rgba(26, 32, 40, 0.76) 97.71%);">
            <div class="flex items-center justify-between rounded-t-3xl p-3 w-full">
                <div class="text-lg font-bold text-zinc-100">
                    History
                </div>
                <button class="linear rounded-[20px] bg-lightPrimary px-4 py-2 text-base font-medium text-brand-500 transition duration-200 hover:bg-gray-100 active:bg-gray-200 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 dark:active:bg-white/20">
                    See all
                </button>
            </div>
            @if($transactions->count() > 0)
            @foreach ($transactions as $transaction)
            @include('components.transaction-card', [
            'transaction' => $transaction,
            'transaction_details' => $transaction->details
            ])
            @endforeach
            @else
            <div class="col-span-full text-center">
                <h5 class="text-gray-600">Aucun historique de transaction disponible.</h5>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
