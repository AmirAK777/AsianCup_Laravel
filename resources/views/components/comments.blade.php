<style>
/* Ajoutez cette classe à votre fichier CSS existant */
.mySwiper .swiper-slide {
    height: auto; /* S'assure que la hauteur de chaque slide s'adapte au contenu */
    max-height: 250px; /* Ajustez ceci en fonction de votre contenu */
    overflow: hidden; /* Cache tout contenu débordant */
}
</style>
<!-- Inclure les styles de Swiper -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Inclure le script de Swiper -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<div>
    <h3 class="text-lg font-semibold mb-4">Avis des clients</h3>
    <!-- Container pour le swiper -->
    <div class="swiper mySwiper">
        <!-- Wrapper pour les slides -->
        <div class="swiper-wrapper">
            @for ($i = 0; $i < 5; $i++)
                @php
                $ratings = [5, 4, 4.5];
                $rating = $ratings[array_rand($ratings)];
                $comments = [
                    'Excellente expérience, je recommande vivement !',
                    'Un match inoubliable dans un stade inoubliable, merci pour tout !',
                    'Super ambiance et bons sièges. Un bon achat !',
                    'Rien à dire, tout était parfait du début à la fin.',
                    'Une sécurité optimale, on se sent en sécurité tout au long du match.',
                    'Un moment magique, gravé à jamais dans ma mémoire !',
                    'Le son était impeccable, on entendait parfaitement les chants des supporters et les commentaires du match.',
                    'Ce stade est devenu un lieu incontournable pour vivre une expérience footballistique unique.',
                    'Je suis conquis, je reviendrai sans hésiter !',
                    'Le son était impeccable, on entendait parfaitement les chants des supporters et les commentaires du match.',
                    'Je suis pleinement satisfait, merci pour tout !',
                    'Une ambiance électrique et des supporters passionnés, un vrai spectacle !',
                    'Un stade magnifique et moderne, une vraie fierté pour la ville !',
                    'Des sièges confortables et une vue imprenable sur le terrain, parfait pour profiter du match !',
                    'La pelouse était en excellent état, un vrai plaisir pour les yeux.',
                    'Un accès facile au stade et des transports en commun bien desservis.'
                    

                ];
                $comment = $comments[array_rand($comments)];
                $names = ['Alex D.', 'Charlie M.', 'Taylor S.', 'Jordan P.', 'Pat K.', 'Alice D.', 'Benjamin P.', 'Camille S.', 'Dylan P.', 'Emma K.', 'Ethan L.', 'Fanny R.', 'Gabriel B.', 'Hadrien T.', 'Inès G.', 'Jade F.',];
                $name = $names[array_rand($names)];
            @endphp
            <div class="swiper-slide">
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-lg">
                        <div class="p-4">
                            <div class="flex items-center mb-1">
                                <div class="flex-shrink-0">
                                    <!-- Placeholder pour l'image de profil -->
                                    <svg class="h-10 w-10 rounded-full" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-900">{{ $name }}</div>
                                    <div class="flex items-center">
                                @for ($j = 0; $j < floor($rating); $j++)
                                    <span class="star-icon text-yellow-500">★</span> {{-- Étoile pleine --}}
                                @endfor
                                @if ($rating - floor($rating) > 0)
                                    <span class="star-icon text-yellow-500">⭑</span> {{-- Étoile à moitié pleine --}}
                                @endif
                                @for ($j = ceil($rating); $j < 5; $j++)
                                    <span class="star-icon text-gray-300">☆</span> {{-- Étoile vide --}}
                                @endfor
                                </div>
                                </div>
                            </div>
                            <p class="text-gray-600">{{ $comment }}</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper('.mySwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        loop: true,
        autoHeight: true, 
    });
</script>