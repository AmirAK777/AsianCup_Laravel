<div class="flex h-full w-full items-start justify-between rounded-md border-[1px] border-[transparent] dark:hover:border-white/20 bg-white px-3 py-[20px] transition-all duration-150 hover:border-gray-200 dark:!bg-navy-800 dark:hover:!bg-navy-700">
    <div class="flex items-center gap-3">

        <div class="flex h-16 w-16 items-center justify-center">
            <img class="h-full w-full rounded-xl object-cover" src="https://www.creativefabrica.com/wp-content/uploads/2022/01/09/ticket-icon-template-Graphics-23210275-1-1-580x387.jpg" alt="" />
        </div>

        <div class="flex flex-col">
            @foreach ($transaction_details as $td)
            <h5 class="text-lg font-bold text-black">
                {{$td->match->name}}
            </h5>
            <p class="mt-1 text-sm font-normal text-gray-600">
                <span>{{$td->quantity}}</span>x<span>{{number_format($td->match->price,0,',','.')}}</span>
            </p>
            <p class="mt-1 text-sm font-normal text-gray-600">
                {{$td->match->stade->name}}
            </p>

            @endforeach
        </div>
    </div>
    <div class="mt-1 flex items-center justify-center text-navy-700">
        <div class="ml-1 flex items-center text-sm font-bold text-navy-700">
            <p class="ml-1">TOTAL</p>
        </div>
        <div class="ml-2 flex items-center text-sm font-normal text-gray-600">
            <p>{{ number_format($transaction_details->sum('total_price'), 0, ',', '.') }}</p>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 1 0 0 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
        </div>
    </div>

</div>
<div class="flex justify-between items-center bg-white border border-gray-200 rounded p-3">
    <p class="mt-1 text-sm font-normal text-gray-600">
        ID de transaction : {{$transaction->id}}</p>
    <p class="mt-1 text-sm font-normal text-gray-600">
        Date : {{$transaction->created_at->format('j F Y')}}</p>
</div>