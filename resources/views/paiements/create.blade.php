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
    <form action="{{route('paiement.store')}}" method="POST">
        @csrf
        <div class="user">
         <label for="">Date de paiement</label>
         <input type="date" name="datedepaiement">
         <label for="">Montant</label>
         <input type="text" id="montant"  name="montant" readonly>
         <input type="hidden" class="statut" name="statut">
         <input type="hidden" name="location_id">
       </div>
       <button class="button" type="submit">Valider</button>
    </form>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const montant = localStorage.getItem('montant');
            document.getElementById('montant').value = montant + 'FCFA';
        });
    </script>
</body>
</html>
@endsection