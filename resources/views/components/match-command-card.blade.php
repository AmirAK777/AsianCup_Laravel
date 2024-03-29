<div class="flex flex-1 mb-6 gap-1 px-4 py-3 rounded border border-orange-300 border-solid bg-emerald-600 bg-opacity-20  text-gray-800 dark:text-white">
    <img src="{{$command->match->match_image}}" alt="product-image" class="w-full rounded-lg sm:w-40" />
    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
        <div class="mt-5 sm:mt-0">
            <h2 class="">{{$command->match->name}}</h2>
            <p class="mt-1 ">{{$command->quantity}} Personnes</p>
        </div>
        <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
            <div class="flex items-center space-x-4">
                <p class="text-sm">{{number_format($command->total_price,0,',','.')}} € </p>

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
        </div>
    </div>
</div>