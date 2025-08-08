@extends('layouts.sidbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/images/baniere1.png">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/style.js')}}" defer></script>
    <title>FAM'S CARS</title>
</head>
<body>
    <section class="location">
    <form id="carForm" action="{{route('voiture.store')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$car->id}}">
       <label for="">Marque</label>
        <input type="text" name="marque" value="{{$car->marque}}">
        <label for="">Modèle</label>
        <input type="text" name="modele" value="{{$car->modele}}">
        <label for="">Matricule</label>
        <input type="text" name="matricule" value="{{$car->matricule}}">
        <label for="">Prix</label>
        <input type="text" id="tarif" name="prix" value="{{$car->prix}}">
        <label for="">Image</label>
        <img id="imagevoiture" src="{{ asset('storage/' . $car->image) }}" alt="" style="width:250px">
        <input type="hidden" name="image" value="{{$car->image}}" >
       <button class="button" type="submit">Suivant</button>
    </section>
    <script>
         const tarif = document.getElementById('tarif').value;
         localStorage.setItem('tarif', tarif);
    </script>
</body>
</html>
@endsection