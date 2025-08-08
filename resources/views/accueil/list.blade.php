@extends('layouts.sidbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="assets/images/baniere1.png">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/style.js')}}" defer></script>
    <title>FAM'S CARS</title>
</head>
<body>
  @if(session()->Has('message'))
<div class="alert alert-success mt-2" role="alert">
  <h5>{{session()->get('message')}}</h5>
</div>
@endif
<div class="table-responsive">
   <table class="table table-dark table-striped mt-3 table-bordered text-center align-middle" id="table">
    <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">Marque</th>
      <th scope="col">Modèle</th>
      <th scope="col">Image</th>
      <th scope="col">Date de Début</th>
      <th scope="col">Date de Fin</th>
      <th scope="col">Paiement</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($locations as $location)
    <tr>
      <th scope="row">{{$user->email}}</th>
      <td>{{$location->voitures->marque}}</td>
      <td>{{$location->voitures->modele}}</td>
      <td><img id="imageList" src="{{ asset('storage/' . $location->voitures->image) }}" alt="" ></td>
      <td>{{$location->datedebut}}</td>
      <td>{{$location->datefin}}</td>
      <td><span class="badge rounded-pill text-bg-info">{{$location->paiements->statut}}</span></td>
      <td><div class="d-flex align-items-center">
    <a class="btn btn-outline-success" href="{{route('location.show',$location->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
</svg></a>
  </div></td>
    @endforeach
    </tr>
    </tbody>
    </table>
</div>
    <script>
      const btndelete=document.getElementById("destroye")
       btndelete.addEventListener("click",()=>{
        if(confirm('Êtes vous sur de vouloir supprimer ta location')){
          document.getElementById('deleteForm').submit();
        };
     })
    </script>
</body>
</html>
@endsection