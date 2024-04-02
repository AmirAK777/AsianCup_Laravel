<!DOCTYPE html>
<html lang="fr">
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://unpkg.com/alpinejs" defer></script>

    <title>
      Asian Cup Ticket Reservation
    </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <meta name="description" content="Simple landind page" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link rel="icon" type="image/png" href="images/asiancup3.png">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
      .gradient {
        background: linear-gradient(90deg, #962184 0%, #3426b3 100%);
      }
      
      a{
    text-decoration: none;
    color: white;
  }
      .text-black {
  color: #000; /* ou 'text-black' si vous utilisez Tailwind */
}

.carousel-container {
  width: 100%;
  height: 45vh; /* Ajustez cette valeur pour correspondre à la hauteur désirée. */
  overflow: hidden; /* Empêche les images de déborder et de changer la hauteur du conteneur */
}


.carousel-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.carousel-slide {
  height: 45vh; /* Assurez-vous que tous les enfants ont la même hauteur que le conteneur */
  object-fit: cover; /* S'assure que les images s'adaptent à la hauteur sans la changer */
}

.carousel-slide *:focus {
  outline: none;
}

.carousel-slide .text-container {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 1rem 1rem 1rem; /* Ajustez l'espace supérieur ici */
  background: rgba(0, 0, 0, 0.5);
}

.carousel-slide .text-container a {
  display: block; /* Assure que le lien remplit la div */
  margin-bottom: 1rem; /* Espace en dessous du titre */
  font-size: 1.5rem;
  color: white; /* Ou toute autre couleur de texte */
  text-decoration: none; /* Enlève le soulignement */
}

.carousel-slide .text-container p {
  color: white; /* Ou toute autre couleur de texte */
  font-size: 1rem;
}

/* Ajoutez du padding au bas du conteneur du texte pour pousser les points vers le bas */
.text-container {
  padding-bottom: 1rem; /* Ajustez cette valeur selon vos besoins */
}

/* Ajoutez cette classe à votre fichier CSS */
.carousel-indicator {
  width: 25px; /* ou la taille désirée */
  height: 25px; /* ou la taille désirée */
  background-color: #fff; /* ou toute autre couleur */
  color: #000; /* couleur du texte */
  border-radius: 50%; /* rend l'indicateur circulaire */
  margin: 0 5px; /* espace entre les indicateurs */
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 12px; /* taille du texte à ajuster selon les besoins */
  cursor: pointer;
}

.carousel-indicator.active {
  background-color: #000; /* ou toute autre couleur pour l'indicateur actif */
  color: #fff; /* couleur du texte pour l'indicateur actif */
}

.custom-hr {
  border-top: 1px solid rgba(156, 163, 175, .25); /* border-gray-100 with 25% opacity */
  margin: 0;
  padding: 0;
}

.color-black, a{
  color:black;
}

.carousel-wrapper {
  overflow: hidden;
  max-width: 100%;
  white-space: nowrap;
  position: relative;
}

.carousel {
  display: flex;
  animation: scroll 30s linear infinite;
  /* 30s est la durée qu'il faut pour que toutes les images défilent une fois */
}

.carousel-item {
  flex: 0 0 auto;
  max-width: 100%;
  display: inline-block;
  position: relative;
}

.carousel-item img {
  max-width: 100%;
  display: block;
}

@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(calc(-250px * 10)); } /* 250px est la largeur d'une image et 10 est le nombre d'images */
}


    </style>
  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <img src = "images/asiancup3.png" width="75" height="75" class="ml-2">
          <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl ml-3" href="#">
            ASIAN CUP
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-transparent lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              
            </li>
            <li class="mr-3">
              
            </li>
            <li class="mr-3">
              
            </li>
          </ul>
          <div class="flex justify-end">
    @guest
    <!-- If user is not authenticated, show these buttons -->
    <a href="{{ route('login') }}"
       class="bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline"
    >
      Connexion
    </a>
    <a href="{{ route('register') }}"
       class="ml-2 bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline"
    >
      Inscription
    </a>
    @endguest

    @auth
    <!-- If user is authenticated, show this button -->
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline"
    >
      Déconnexion
    </a>
    
    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="ml-4 relative">
    <a href="/profile" class="inline-block">
        <button class="bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline">
            <i class="fas fa-user mr-2"></i>
            Profil
        </button>
    </a>
</div>
    @endauth
  </div>
  <hr class="custom-hr"/>
    </nav>
    <!--Hero-->
    <div class="pt-24">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
          <p class="uppercase tracking-loose w-full">AFC Asian Cup</p>
          <h1 class="my-4 text-5xl font-bold leading-tight">
            Bienvenue sur le site de réservation de billet officiel pour la CAN 2023/2024 !
          </h1>
          <p class="leading-normal text-2xl mb-8">
            Des matchs d'exceptions vous attendent durant cette grande compétition !
          </p>
          <a href="/home" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Voir les billets
        </a>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 py-6 text-center">
          <img class="w-full md:w-4/5 z-50" src="images/ppasiancup2.png" />
        </div>
      </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
      <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
          </g>
        </g>
      </svg>
    </div>
    <section class="bg-white border-b py-8" style="margin-bottom: 50px;">
      <div class="container max-w-5xl mx-auto m-8">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          Les 10 lieux incroyable à visiter au Qatar
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-80 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div x-data="carousel()" class="relative" x-init="init()">
  <!-- Slides -->
  <div class="overflow-hidden relative carousel-container">
  <div class="carousel-indicators">
  <template x-for="(slide, index) in slides" :key="index">
  <div x-show="activeSlide === index" class="flex justify-center items-center w-full h-full carousel-slide" x-transition:enter="transition-opacity duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <img :src="slide.image" class="block w-full h-auto" alt="Slide image">
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-opacity-50 bg-black text-white">
      <!-- Modifiez cette ligne avec 'x-bind:href' pour Alpine.js -->
      <div class="text-container">
      <a x-bind:href="slide.link" target="_blank" class="text-xl font-bold" x-text="slide.title" tabindex="-1"></a>
      <p x-text="slide.description"></p>
</div>
    </div>
  </div>
</template>
</div>
  </div>

  <div class="absolute w-full flex justify-center p-4" style="bottom: 10px;">
  <template x-for="(slide, index) in slides" :key="index">
    <button @click="activeSlide = index" class="carousel-indicator" :class="{ 'active': activeSlide === index }" x-text="index + 1"></button>
  </template>
</div>

  <!-- Controls -->
  <button @click="prev()" class="absolute top-1/2 left-0 transform -translate-y-1/2 p-3 text-white bg-black bg-opacity-50 rounded-full">
    <span class="sr-only">Previous</span>
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
  </button>
  <button @click="next()" class="absolute top-1/2 right-0 transform -translate-y-1/2 p-3 text-white bg-black bg-opacity-50 rounded-full">
    <span class="sr-only">Next</span>
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
  </button>
</div>

<script>
function carousel() {
  return {
    activeSlide: 0,
    slides: [
      {
        image: "{{ asset('images/stade.jpg') }}",
        title: "1. Khalifa International Stadium",
        description: "Découvrez le Stade International Khalifa, une icône du sport Qatari, et explorez son histoire riche et son architecture futuriste.",
        link: "https://visitqatar.com/fr-fr/things-to-do/adventures/other-sports-and-activities/khalifa-international-stadium"
      },
      {
        image: "{{ asset('images/thecorniche.png') }}",
        title: "2. The Corniche",
        description: "Découvrez la magie de la Corniche, entre mer et skyline, pour une expérience inoubliable au Qatar",
        link: "https://visitqatar.com/fr-fr/highlights/iconic-places/the-corniche"
      },
      {
        image: "{{ asset('images/archipel1.png') }}",
        title: "3. The Pearl Island",
        description: "Découvrez le luxe insulaire de The Pearl au Qatar, où élégance et modernité se rencontrent pour une expérience inoubliable",
        link: "https://visitqatar.com/fr-fr/highlights/iconic-places/the-pearl-qatar"
      },
      {
        image: "{{ asset('images/mosque.png') }}",
        title: "4. State Grand Mosque",
        description: "Découvrez la majesté spirituelle de la Mosquée Imam Abdul Wahhab au Qatar, un symbole de piété et de beauté architecturale.",
        link: "https://visitqatar.com/fr-fr/highlights/iconic-places/imam-abdul-wahhab-mosque"
      },
      {
        image: "{{ asset('images/test.jpg') }}",
        title: "5. Qatar Islamic Cultural Center",
        description: "Plongez dans la sérénité et la splendeur architecturale de la Mosquée Sheikh Abdulla Bin Zaid Al Mahmoud, un trésor spirituel au cœur du Qatar.",
        link: "https://visitqatar.com/fr-fr/highlights/iconic-places/sheikh-abdulla-bin-zaid-almahmoud"
      },
      {
        image: "{{ asset('images/katara.png') }}",
        title: "6. Katara Mosque",
        description: "Explorez la tranquillité de la Mosquée Katara, alliant tradition et modernité au Qatar.",
        link: "https://www.tripadvisor.fr/Attraction_Review-g294009-d8435229-Reviews-Katara_Mosque-Doha.html"
      },
      {
        image: "{{ asset('images/wakara.jpg') }}",
        title: "7. Al Wakrah Souq",
        description: "Plongez dans l'authenticité du Souq Al Wakrah, où l'histoire rencontre la vie moderne dans un marché animé au Qatar.",
        link: "https://www.tripadvisor.fr/Attraction_Review-g3221436-d9742366-Reviews-Al_Wakrah_Souq-Al_Wakrah.html"
      },
      {
        image: "{{ asset('images/souqwaqif.jpg') }}",
        title: "8. Souq Waqif",
        description: "Laissez-vous emporter par les couleurs, les parfums et l'ambiance envoûtante du Souq Waqif.",
        link: "https://visitqatar.com/fr-fr/highlights/iconic-places/12-things-to-do-in-souq-waqif"
      },
      {
        image: "{{ asset('images/dafnapark.png') }}",
        title: "9. Dafna Park",
        description: "Détendez-vous au cœur de la nature urbaine au Dafna Park, un havre de paix où verdure et tranquillité se rencontrent au Qatar.",
        link: "https://www.tripadvisor.fr/Attraction_Review-g294009-d12030499-Reviews-Dafna_Park-Doha.html"
      },
      {
        image: "{{ asset('images/downtown1.jpg') }}",
        title: "10. Msheireb Downtown Doha",
        description: "Explorez le cœur vibrant de Doha à Msheireb Downtown, entre modernité et tradition qataries.",
        link: "https://visitqatar.com/fr-fr/highlights/iconic-places/msheireb-downtown"
      },
    ],
    //autoTransition: null, // Variable pour stocker l'intervalle de transition automatique
    init() {
      //this.startAutoTransition();
    },
    clearAutoTransition() {
      // Nettoie l'intervalle si celui-ci existe
      if (this.autoTransition) {
        clearInterval(this.autoTransition);
        this.autoTransition = null;
      }
    },
    next() {
      this.activeSlide = this.activeSlide === this.slides.length - 1 ? 0 : this.activeSlide + 1;
    },
    prev() {
      this.activeSlide = this.activeSlide === 0 ? this.slides.length - 1 : this.activeSlide - 1;
    },
    // Appelez cette méthode lorsqu'une interaction manuelle a lieu pour arrêter la transition automatique
    stopAutoTransition() {
      this.clearAutoTransition();
    }
  }
}
</script>

</div>
<section class="container mx-auto text-center py-6 mb-12">
  <h2 class="w-full my-2 text-5xl font-bold leading-tight text-black">
    Une compétition exceptionnelle !
  </h2>
  <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-80 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
  <div class="carousel-wrapper">
    <div class="carousel" id="carouselExample">
      <!-- Ici, vous placerez vos images sous forme de div avec la classe "carousel-item" -->
      <div class="carousel-item">
        <img src="images/kr3.jpg" alt="Image 1">
      </div>
      <div class="carousel-item">
        <img src="images/kr.jpg" alt="Image 2">
      </div>
      <div class="carousel-item">
        <img src="images/kr2.jpg" alt="Image 3">
      </div>
      <div class="carousel-item">
        <img src="images/kr4.jpg" alt="Image 4">
      </div>
      <div class="carousel-item">
        <img src="images/kr5.jpg" alt="Image 5">
      </div>
      <div class="carousel-item">
        <img src="images/kr6.jpg" alt="Image 6">
      </div>
      <div class="carousel-item">
        <img src="images/kr7.jpg" alt="Image 7">
      </div>
      <div class="carousel-item">
        <img src="images/kr8.jpg" alt="Image 8">
      </div>
      <div class="carousel-item">
        <img src="images/kr9.jpg" alt="Image 9">
      </div>
      <div class="carousel-item">
        <img src="images/kr10.jpg" alt="Image 10">
      </div>
      <!-- Répétez pour autant d'images que vous avez -->
    </div>
  </div>
</section>
    <!--Footer-->
    <footer class="bg-white">
      <div class="container mx-auto px-8">
        <div class="w-full flex flex-col md:flex-row py-6">
          <div class="flex w-1/4 mb-6 text-black">
              <!--Icon from: http://www.potlabicons.com/ -->
              <a class="toggleColor text-black no-underline hover:no-underline font-bold text-2xl lg:text-2xl" href="#">
              <img src = "images/asiancup3.png" width="75" height="75" class="ml-2">
            ASIAN CUP
          </a>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">HELP</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="/ticket" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
              </li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Social</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="https://www.facebook.com/AFCAsianCup/" class="no-underline hover:underline text-gray-800 hover:text-pink-500" target="_blank">Facebook</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="https://www.instagram.com/afcasiancup/" class="no-underline hover:underline text-gray-800 hover:text-pink-500" target="_blank">Instagram</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="https://twitter.com/Qatar2023en" class="no-underline hover:underline text-gray-800 hover:text-pink-500" target="_blank">Twitter</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="https://www.youtube.com/AFCAsianCup" class="no-underline hover:underline text-gray-800 hover:text-pink-500" target="_blank">YouTube</a>
              </li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">AFC ASIAN CUP</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="https://www.the-afc.com/en/home.html" class="no-underline hover:underline text-gray-800 hover:text-pink-500" target="_blank">Website of AFC</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="https://www.the-afc.com/en/more/contact.html" class="no-underline hover:underline text-gray-800 hover:text-pink-500" target="_blank">Contact AFC</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="https://en.wikipedia.org/wiki/AFC_Asian_Cup" class="no-underline hover:underline text-gray-800 hover:text-pink-500" target="_blank">About Asian Cup</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
    <script>
      var scrollpos = window.scrollY;
      var header = document.getElementById("header");
      var navcontent = document.getElementById("nav-content");
      var navaction = document.getElementById("navAction");
      var brandname = document.getElementById("brandname");
      var toToggle = document.querySelectorAll(".toggleColour");

      document.addEventListener("scroll", function () {
        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if (scrollpos > 10) {
          header.classList.add("bg-white");
          navaction.classList.remove("bg-white");
          navaction.classList.add("gradient");
          navaction.classList.remove("text-gray-800");
          navaction.classList.add("text-white");
          //Use to switch toggleColour colours
          for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-gray-800");
            toToggle[i].classList.remove("text-white");
          }
          header.classList.add("shadow");
          navcontent.classList.remove("bg-gray-100");
          navcontent.classList.add("bg-white");
        } else {
          header.classList.remove("bg-white");
          navaction.classList.remove("gradient");
          navaction.classList.add("bg-white");
          navaction.classList.remove("text-white");
          navaction.classList.add("text-gray-800");
          //Use to switch toggleColour colours
          for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-white");
            toToggle[i].classList.remove("text-gray-800");
          }

          header.classList.remove("shadow");
          navcontent.classList.remove("bg-white");
          navcontent.classList.add("bg-gray-100");
        }
      });
    </script>
    <script>
      
      /*Toggle dropdown list*/
      /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

      var navMenuDiv = document.getElementById("nav-content");
      var navMenu = document.getElementById("nav-toggle");

      document.onclick = check;
      function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
          // click NOT on the menu
          if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
              navMenuDiv.classList.remove("hidden");
            } else {
              navMenuDiv.classList.add("hidden");
            }
          } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
          }
        }
      }
      function checkParent(t, elm) {
        while (t.parentNode) {
          if (t == elm) {
            return true;
          }
          t = t.parentNode;
        }
        return false;
      }

      window.addEventListener('scroll', function() {
  var header = document.getElementById('header');
  var text = document.querySelector('.toggleColour'); // Assurez-vous que cette classe correspond bien à votre texte "ASIAN CUP"
  // Lorsque l'utilisateur défile vers le bas, window.scrollY sera supérieur à 0
  if (window.scrollY > 0) {
    text.classList.add('text-black'); // 'text-black' est la classe de Tailwind pour le texte noir
  } else {
    text.classList.remove('text-black'); // Cela garantit que le texte redevient blanc quand on remonte en haut de la page
  }
  
});


    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>