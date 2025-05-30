@extends('layouts.sidbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/style.js')}}" defer></script>
    <title>Document</title>
</head>
<body>
    <section class="location">
    <form action="{{route('location.store')}}" method="POST">
        @csrf
        <div class="user">
         <label for="">Date de début</label>
         <input id="debut" type="date" name="datedebut">
         <label  for="">Date de Fin</label>
         <input  type="date" id="fin" name="datefin">
         <input type="hidden" id="statuts"  name="statuts">
         @foreach($users as $user)
         <input id="utilisateur" type="hidden" value="{{$user->id}}" name="user_id">
         @endforeach
        @foreach($voitures as $voiture)
         <input type="hidden" id="voiture" value="{{$voiture->id}}"  name="voitures_id">
         @endforeach
       </div>
       <button class="button" type="submit" onclick="calculerMontant()">Suivant</button>
    </form>
    </section>
     <script>
        function calculerMontant() {
            const dateDebut = new Date(document.getElementById('debut').value);
            const dateFin = new Date(document.getElementById('fin').value);
            const differenceEnMillisecondes = dateFin - dateDebut;
            const differenceEnJours = differenceEnMillisecondes / (1000 * 3600 * 24);
            const montant = differenceEnJours * 15000;

            localStorage.setItem('montant', montant);
        }
    </script>
</body>
</html>
@endsection