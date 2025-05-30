<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
     <div class="nav">
        <a href="#" class="logo"><span>FAM'S</span>CAR</a>
        <div class="spane">
        <i class="fa-solid fa-xmark" id="exit"></i>
        <span class="contacter"><a href="{{route('profile.edit')}}">Mon profil</a></span>
        <span class="contacter"><a href="{{route('affiche')}}">Accueil</a></span>
        <span class="contacter"><a href="/create">Louer</a></span>
        <span class="contacter"><a href="/list">Ma location</a></span>
         <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <span id="spano">{{ __('Déconnexion') }}</span>
                    </x-responsive-nav-link>
                </form>
        </div>
        <i class="fa-solid fa-bars" id="icon"></i>
    </div>
    <section class="header" id="header">
        <div class="headerDescript">
            <div class="mycar">
                <p>13 <br> Marques</p>
            </div>
            <div class="mycar">
                <p>39<br> Modèles</p>
            </div>
            <div class="sectionVoiture">
              <h1 class="animated-text">Tout à votre<span> disposition</span></h1>
            </div>
            <div class="sectionVoiture">
              <i >Cliquer sur <strong>Louer</strong> pour en profiter</i>
            </div>
        </div>
        <img class="headerImg" src="assets/images/baniere1.png" alt="">
    </section>
    <!-- <h1>Évolution des Locations au Fil des Ans</h1> -->
    <div class="client">
        <h1>Évolution des Locations<span> au Fil des années</span></h1>
    </div>
    <canvas id="myChart"></canvas>
    <script>
        const icon=document.getElementById("icon");
        const xmark=document.getElementById("exit");
        const ul=document.querySelector(".spane");
        icon.addEventListener("click",()=>{
        ul.style.right="0%";
        icon.style.display="none"
     })
     xmark.addEventListener("click",()=>{
        ul.style.right="-100%";
        icon.style.display="block"
     })


     const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Nombre de locations (en milliers)',
                    data: [20, 25, 30, 35, 50, 60, 70, 90, 100, 120, 80, 90, 110, 130, 150, 180],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>