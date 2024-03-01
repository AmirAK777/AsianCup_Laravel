<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
  a{
    text-decoration: none;
    color: white;
  }
</style>


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-slide="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="8" aria-label="Slide 9"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="9" aria-label="Slide 10"></button>


      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/stade.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <a href="https://visitqatar.com/fr-fr/things-to-do/adventures/other-sports-and-activities/khalifa-international-stadium" target="_blank"><h3>1. Khalifa International Stadium</h3></a>
              <p>Plongez dans l'authenticité du Souq Al Wakrah, où l'histoire rencontre la vie moderne dans un marché animé au Qatar.</p>
            </div>
          </div>
        <div class="carousel-item">
          <img src="images/thecorniche.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <a href="https://visitqatar.com/fr-fr/highlights/iconic-places/the-corniche" target="_blank"><h3>2. The Corniche</h3></a>
            <p>Découvrez la magie de la Corniche, entre mer et skyline, pour une expérience inoubliable au Qatar.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/archipel1.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <a href="https://visitqatar.com/fr-fr/highlights/iconic-places/the-pearl-qatar" target="_blank"><h3>3. The Pearl Island</h3></a>
            <p>Découvrez le luxe insulaire de The Pearl au Qatar, où élégance et modernité se rencontrent pour une expérience inoubliable.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/mosque.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <a href="https://visitqatar.com/fr-fr/highlights/iconic-places/imam-abdul-wahhab-mosque" target="_blank"><h3>4. State Grand Mosque</h3></a>
            <p>Découvrez la majesté spirituelle de la Mosquée Imam Abdul Wahhab au Qatar, un symbole de piété et de beauté architecturale.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/test.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <a href="https://visitqatar.com/fr-fr/highlights/iconic-places/sheikh-abdulla-bin-zaid-almahmoud" target="_blank"><h3>5. Qatar Islamic Cultural Center</h3></a>
            <p>Plongez dans la sérénité et la splendeur architecturale de la Mosquée Sheikh Abdulla Bin Zaid Al Mahmoud, un trésor spirituel au cœur du Qatar.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/katara.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <a href="https://www.tripadvisor.fr/Attraction_Review-g294009-d8435229-Reviews-Katara_Mosque-Doha.html" target="_blank"><h3>6. Katara Mosque</h3></a>
            <p>Explorez la tranquillité de la Mosquée Katara, alliant tradition et modernité au Qatar.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/wakara.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <a href="https://www.tripadvisor.fr/Attraction_Review-g3221436-d9742366-Reviews-Al_Wakrah_Souq-Al_Wakrah.html" target="_blank"><h3>7. Al Wakrah Souq</h3></a>
            <p>Plongez dans l'authenticité du Souq Al Wakrah, où l'histoire rencontre la vie moderne dans un marché animé au Qatar.</p>
          </div>
        </div>
        <div class="carousel-item">
        <img src="images/souqwaqif.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <a href="https://visitqatar.com/fr-fr/highlights/iconic-places/12-things-to-do-in-souq-waqif" target="_blank"><h3>8. Souq Waqif</h3></a>
            <p>Laissez-vous emporter par les couleurs, les parfums et l'ambiance envoûtante du Souq Waqif.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/dafnapark.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <a href="https://www.tripadvisor.fr/Attraction_Review-g294009-d12030499-Reviews-Dafna_Park-Doha.html" target="_blank"><h3>9. Dafna Park</h3></a>
              <p>Détendez-vous au cœur de la nature urbaine au Dafna Park, un havre de paix où verdure et tranquillité se rencontrent au Qatar.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/downtown1.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <a href="https://visitqatar.com/fr-fr/highlights/iconic-places/msheireb-downtown" target="_blank"><h3>10. Msheireb Downtown Doha</h3></a>
                <p>Explorez le cœur vibrant de Doha à Msheireb Downtown, entre modernité et tradition qataries.</p>
              </div>
            </div>
        
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>








<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>