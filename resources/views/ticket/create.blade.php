<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <h1 class="text-white text-lg font-bold">Create new support ticket</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg ">

            <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea placeholder="Add description" name="description" id="description"  value="" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
                    <x-file-input name="attachment" id="attachment" />
                    <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        Create
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>