<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init({
        publicKey: "p-VsWUfkCTOpqFwV2",
      });
   })();
</script>
    <title>Document</title>
</head>
<body>
    <div class="nav">
        <a href="#" class="logo"><span>FAM'S </span>CARS</a>
        <ul>
            <i class="fa-solid fa-xmark" id="exit"></i>
            <li><a href="#header" class="active">Accueil</a></li>
            <li><a href="#propo">A propos</a></li>
            <li><a href="#contacte">Nous Contacter</a></li>
            <li><a href="/list">Location/Profil</a></li>
            @guest
            <li><a href="/login">Connexion</a></li>
            @endguest
            @auth
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <span id="spano">{{ __('Déconnexion') }}</span>
                    </x-responsive-nav-link>
                </form>
            </li>
            @endauth
        </ul>
                <i class="fa-solid fa-bars" id="icon"></i>
    </div>
    <section class="header" id="header">
        <div class="headerDescript">
            <h1 >Bienvenue chez <span>FAM'S </span>CARS</h1>
            <p>Nous sommes votre partenaire de confiance pour la location de voitures, offrant une large gamme de véhicules pour répondre à tous vos besoins de déplacement.</p>
            <!-- <a class="animated-text" href="">FAM'S CARS,le meilleur dans ce domaine</a> -->
            <div class="sectionVoiture">
              <h1 class="animated-text">Tout à votre<span> disposition</span></h1>
            </div>
            <div class="sectionVoiture">
              <i >Cliquer sur <strong>Louer</strong> pour en profiter</i>
            </div>
        </div>
        <img class="headerImg" src="assets/images/baniere1.png" alt="">
    </section>
     <div class="experiences">
        <h1>DES VOITURES <span>DE QUALILÉ</span></h1>
        <div class="oscillating-dots">
          <div class="dot"></div>
          <div id="dot" class="dot"></div>
          <div class="dot"></div>
        </div>
    </div>
    <section class="voiture" id="voiture">
       <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($cars as $car)
            <div class="swiper-slide">
                <div class="cart-voiture">
                    <img src="{{ asset('storage/' . $car->image) }}" alt="">
                    <div class="cart-car">
                        <h2>Marque: {{$car->marque}}</h2>
                        <p><strong>Modèle: {{$car->modele}}</strong></p>
                        <p><strong>Matricule: {{$car->matricule}}</strong></p>
                        <p><strong>Prix: {{$car->prix}} FCFA</strong></p>
                        @if($matriculesFromCars->contains($car->matricule))
                        <p style="color:red"><strong>Voiture indisponible</strong></p>
                        <a>louer</a>
                        @else
                        <p style="color:green"><strong>Voiture disponible</strong></p>
                        <a href="{{route('voiture.create',$car->id)}}">louer</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    </section>
    <div class="experiences">
        <h1>A PROPOS DE <span>FAM'S CARS</span></h1>
        <div class="oscillating-dots">
          <div class="dot"></div>
          <div id="dot" class="dot"></div>
          <div class="dot"></div>
        </div>
    </div>
    <section class="propos" id="propo">
        <div class="textPropos">
            <h1>Pourquoi nous?</h1>
            <p>Chez <span>FAM'S CARS</span>, nous nous engageons à offrir une expérience de location de voiture inégalée. Notre flotte diversifiée répond à tous vos besoins, qu'il s'agisse d'un voyage d'affaires ou d'une escapade en famille. Nous garantissons des véhicules impeccables, régulièrement entretenus pour votre sécurité et votre confort.</p>
            <p>Notre équipe professionnelle est à votre écoute, prête à vous conseiller sur le choix du véhicule idéal. Avec des tarifs compétitifs et transparents, il n'y a pas de frais cachés. De plus, notre processus de réservation rapide et facile vous permet de gagner du temps.</p>
            <p>Choisir <span>FAM'S CARS</span>, c'est opter pour la fiabilité, la qualité de service et une passion pour la mobilité. Faites confiance à notre expertise pour rendre vos trajets agréables et sans stress.</p>
        </div>
        <img src="assets/images/baniere1.png" alt="">
    </section>
    <div class="experiences">
        <h1>NOS <span>CLIENTS </span></h1>
    </div>
    <section class="reactClient">
        <div class="client-content">
            <img src="assets/images/client1.jpg" alt="">
            <h2>Wizzy</h2>
            <p>"FAMTRANSPORT a transformé notre road trip en une expérience incroyable avec des voitures confortables et un service exceptionnel "</p>
        </div>
        <div class="client-content">
            <img src="assets/images/client2.jpg" alt="">
            <h2>Elhadj</h2>
            <p>"Un service rapide et professionnel, FAMTRANSPORT a dépassé nos attentes lors de notre réservation de véhicule"</p>
        </div>
        <div class="client-content">
            <img src="assets/images/client3.jpg" alt="">
            <h2>Ben Alain</h2>
            <p>"Nous avons loué une voiture pour nos vacances et tout a été parfait, de la réservation à la restitution. Merci FAMTRANSPORT"</p>
        </div>
    </section>
     <div class="experiences">
        <h1>NOUS <span>CONTACTER</span></h1>
    </div>
    <section class="contact" id="contacte">
        <div class="carte">
         <iframe id="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.2240361457466!2d-17.449271026292706!3d14.756404273245932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec10d17202daf73%3A0xe1d59c208f514922!2sTerrain%20ACAPES!5e0!3m2!1sfr!2ssn!4v1747262349513!5m2!1sfr!2ssn"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      <form action="">
          <p>Envoyer-nous un message</p>
          <input type="text" id="nom" name="name" placeholder="Votre nom">
          <input type="text" id="mail" name="email" placeholder="Votre email">
          <textarea id="texter" name="message" placeholder="Votre message"></textarea>
          <button type="submit"  onclick="sendMail()">ENVOYER LE MESSAGE</button>
      </form>  
    </section>
    <section class="piedPage">
    <div class="foot-content">
        <h4>FAM'S CAR</h4>
        <div class="traitFoot"></div>
        <p>Nous sommes une entreprise <br>
            dédiée à l'optimisation <br>
            des solutions de transport. </p>
    </div>
    <div class="foot-content">
        <h4>Liens rapides</h4>
        <div class="traitFoot"></div>
        <div class="link">
            <ul>
                <li><a href="#header">Accueil</a></li>
                <li><a href="#propo">A propos</a></li>
                <li><a href="#contacte">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="foot-content">
        <h4>Réseaux sociaux</h4>
        <div class="traitFoot"></div>
        <div class="link">
            <ul id="reseau">
                <li><a href="https://www.facebook.com/share/1LxDb77iiJ/?mibextid=wwXIfr"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/lucas_jr_fam?igsh=azFkb3I1ZXJvbnA1&utm_source=qr"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.linkedin.com/in/linkedin.com/in/amath-fam-178a22353"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="tel:+221708648515"><i class="fa-solid fa-phone"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="foot-content">
        <h4>Contactez-nous</h4>
        <div class="traitFoot"></div>
        <p>Parcelles Assainies En face terrain Acapes</p>
        <p>amathfam2002@gmail.com.com</p>
        <p>+221 708648515</p>
    </div>
</section>
<div class="copyright">
        <p>© 2025 Tous droits réservés. Conçu par</p>
        <ul>
            <li><a href="">Mentions légales</a></li>
            <li><a href="">Politique de confidentialité</a></li>
            <li><a href="">Conditions d'utilisation</a></li>
        </ul>
    </div>
    <script>
        const icon=document.getElementById("icon");
        const xmark=document.getElementById("exit");
        const ul=document.querySelector(".nav ul");
        icon.addEventListener("click",()=>{
        ul.style.right="0%";
        icon.style.display="none"
     })
     xmark.addEventListener("click",()=>{
        ul.style.right="-100%";
        icon.style.display="block"
     })


     function sendMail(){
    let params={
      name:document.getElementById("nom").value,
      email:document.getElementById("mail").value,
      message:document.getElementById("texter").value,
    }
    emailjs.send("service_1r7fyyv","template_4x8um8f",params).then(alert("Message envoyé avec succès"));
  }


  document.addEventListener('scroll', function() {
    const img = document.querySelector('.propos img');
    const imgPosition = img.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.9; 

    if (imgPosition < screenPosition) {
        img.classList.add('visible');
    }
});

 const swiper = new Swiper('.swiper', {
    navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    spaceBetween: 20,
    loop:true,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
        slidesPerView: 3, // Nombre de diapositives visibles
        spaceBetween: 30,  // Espacement entre les diapositives
        breakpoints: {
            // Responsive
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
    </script>
</body>
</html>