@extends('layouts.sidbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/style.js')}}" defer></script>
    <title>Document</title>
</head>
<body>
  @if(session()->Has('message'))
<div class="alert alert-success mt-2" role="alert">
  <h5>{{session()->get('message')}}</h5>
</div>
@endif
    <table class="table table-dark table-striped mt-3 table-bordered" id="table">
    <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">Marque</th>
      <th scope="col">Modèle</th>
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
      <td>{{$location->datedebut}}</td>
      <td>{{$location->datefin}}</td>
      <td><span class="badge rounded-pill text-bg-info">{{$location->paiements->statut}}</span></td>
      <td><div class="d-flex align-items-center"><a class="btn btn-outline-info me-1" href="{{route('location.edit',$location->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>
  <form id="deleteForm" action="{{route('location.destroy',$location->id)}}" method="post">
     @csrf
     @method('DELETE')
      <button type="button" id="destroye" class="btn btn-outline-danger me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></button>
    </form>
    <a class="btn btn-outline-success" href="{{route('location.show',$location->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
</svg></a>
  </div></td>
    @endforeach
    </tr>
    </tbody>
    </table>
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