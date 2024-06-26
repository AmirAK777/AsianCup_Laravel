<x-app-layout>
    <section class="pl-6 -mt-1.5 max-w-full bg-slate-950  max-md:pl-5">
        <div class="flex gap-5 max-md:flex-col max-md:gap-0">
            <div class="flex flex-col w-[39%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col self-stretch my-auto max-md:mt-10 max-md:max-w-full">
                    <h1 class="text-3xl text-green-500 max-md:max-w-full">
                        <span class="text-2xl leading-7 text-white">CONNECTEZ-VOUS ET ACHETEZ.</span>
                        <br />
                        <span class="text-6xl font-extrabold leading-[68px]">SÉCURISEZ VOS BILLETS </span>
                        <span class="text-6xl font-extrabold text-green-500 leading-[68px]">DÈS AUJOURD'HUI!</span>
                    </h1>
                    <button class="justify-center self-start px-8 py-2 mt-7 text-sm font-semibold leading-6 text-white bg-pink-700 rounded max-md:px-5">
                        <a href="/billet">Mes Billets !</a>
                    </button>
                </div>
            </div>
            <div class="flex flex-col ml-5 w-[61%] max-md:ml-0 max-md:w-full">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b15949ec8c636d3ae5df6328846c3317838f99b2eb415b4803d871ddcbdcb1aa?apiKey=97622c207ace4937b2e9a053c7073cf1&" alt="Promotional image for sign up reward" class="grow w-full aspect-[2.22] max-md:mt-10 max-md:max-w-full" />
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="z-10 px-5 -mt-6 w-full max-w-screen-xl max-md:max-w-full">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                        @foreach ($matches as $match)
                        <x-match-card :team1="$match->team1" :team2="$match->team2" :match="$match" :stade="$match->stade" :image="$match->stade->image_stade" />


                        @endforeach
                    </div>
                </div>
            </div>
    </section>




</x-app-layout>