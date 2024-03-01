<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Match') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('matches.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Match Name:</label>
                        <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Match Date:</label>
                        <input type="date" name="date" id="date" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                    </div>
                    <div class="mb-4">
                        <label for="stade" class="block text-gray-700 text-sm font-bold mb-2">Stadium:</label>
                        <select name="stade_id" id="stade" class="form-select rounded-md shadow-sm mt-1 block w-full">
                            @foreach($stades as $stade)
                            <option value="{{ $stade->id_stade }}">{{ $stade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-primary-button type="submit">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>