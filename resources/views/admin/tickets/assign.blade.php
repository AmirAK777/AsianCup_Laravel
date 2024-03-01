<!-- resources/views/admin/tickets/assign.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="font-semibold text-lg mb-4">{{ __('Assign Ticket') }}</h3>
                <form method="POST" action="{{ route('admin.tickets.assign', $ticket->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="support_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Support User') }}</label>
                        <select name="support_id" id="support_id" class="form-select rounded-md shadow-sm mt-1 block w-full">
                            @foreach ($supportUsers as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-primary-button type="submit">
                            {{ __('Assign') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
