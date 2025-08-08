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
    <form id="carForm" action="{{route('car.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Marque</label>
        <input type="text" name="marque">
        <label for="">Modèle</label>
        <input type="text" name="modele">
        <label for="">Matricule</label>
        <input type="text" name="matricule">
        <label for="">Prix</label>
        <input type="text" name="prix">
        <label for="">Image</label>
        <input type="file" name="image" accept="image/*">
       <button class="button" type="submit">Suivant</button>
    </form>

    </section>
</body>
</html>
@endsection