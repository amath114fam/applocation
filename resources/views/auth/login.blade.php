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
        <div class="carte" id="img-login">
         <img src="assets/images/baniere1.png" alt="" id="tof">
        </div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
          <p>Se connecter</p>
          <input type="email" placeholder="Votre email"  name="email" :value="old('email')" required autofocus autocomplete="username">
          <input placeholder="Votre mot de passe" type="password"
                            name="password"
                            required autocomplete="current-password" />
                            <button>{{ __('Se connecter') }}</button>
          <p class="compte">Pas de compte <a href="/register">S'inscrire</a></p>
          <div>
             @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('mot de passe oublié?') }}
                </a>
            @endif

            <p></p>
            @if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          </div>
      </form>  
    </section>
</body>
</html>