<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
</head>
<body>
    <section class="contact">
        <div class="carte">
         <img src="assets/images/baniere1.png" alt="">
        </div>
      <form method="POST" action="{{ route('register') }}">
        @csrf
          <p>Se connecter</p>
          <input type="text" placeholder="Votre nom"  name="name" :value="old('name')" required autofocus autocomplete="name">
          <input type="email" placeholder="Votre email"  name="email" :value="old('email')" required autofocus autocomplete="username">
          <input placeholder="Votre mot de passe" type="password"
                            name="password" 
                            required autocomplete="new-password" />
          <input placeholder="Confirmer votre mot de passe" type="password"
                            name="password_confirmation" 
                            required autocomplete="new-password" />

                            <button>{{ __("S'incrire") }}</button>
          <p class="compte">Déjà inscrire <a href="/login">Se connecter</a></p>
          
      </form>  
    </section>
</body>
</html>