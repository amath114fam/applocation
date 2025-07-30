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
         
         <input id="utilisateur" type="hidden" value="{{$users['id']}}" name="user_id">

         <input type="hidden" id="voiture" name="voitures_id">
       </div>
       <button class="button" type="submit" onclick="calculerMontant()">Suivant</button>
    </form>
    </section>
     <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('debut').value = today;
        function calculerMontant() {
            const dateDebut = new Date(document.getElementById('debut').value);
            const dateFin = new Date(document.getElementById('fin').value);
            const differenceEnMillisecondes = dateFin - dateDebut;
            const differenceEnJours = differenceEnMillisecondes / (1000 * 3600 * 24);

            const valeurTarif = localStorage.getItem('tarif');
            const montant = differenceEnJours * valeurTarif;

            localStorage.setItem('montant', montant);
        }
    </script>
</body>
</html>
@endsection