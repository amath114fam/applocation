<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="nav">
        <a href="#" class="logo"><span>FAM'S</span>CAR</a>
     <div class="spane">
        <i class="fa-solid fa-xmark" id="exit"></i>
        <span class="contacter"><a href="{{route('profile.edit')}}">Mon profil</a></span>
        <span class="contacter"><a href="{{route('affiche')}}">Accueil</a></span>
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
   @yield('content')
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
    </script>
</body>
</html>