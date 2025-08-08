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
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <title>FAM'S CARS</title>
</head>
<body>
    <div class="contentAdmin">
        <div class="dashboard">
            <h3>Tableau de bord</h3>
            <ul>
                <li><a id="alldash" href="#"><i class='bx  bx-apps-alt'  ></i> Tout</a></li>
                <li><a id="voitureClick" href="#"><i class='bx  bx-car'  ></i>Voitures</a></li>
                <li><a id="paimentClick" href="#"><i class='bx  bx-credit-card-alt'  ></i>Paiements</a></li>
                <li> <a id="locationClick" href="#"><i class='bx  bx-pin'  ></i>Locations</a></li>
                <li> <a id="voitureClick" href="{{route('car.index')}}"><i class='bx  bx-arrow-in-down-right-stroke-square'  ></i> Insertion voiture</a></li>
            </ul>
        </div>
    <table id="dashlocation" class="table table-dark table-striped mt-3 table-bordered text-center align-middle" id="table" style="display:none">
    <thead>
    <tr class="text-center align-middle">
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
      <td><div class="d-flex align-items-center"><a class="btn btn-outline-info me-1" href="{{route('location.edit',$location->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>
  <form id="deleteForm" action="{{route('location.destroy',$location->id)}}" method="post">
     @csrf
     @method('DELETE')
      <button type="submit" id="destroye" class="btn btn-outline-danger me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
    <table id="dashvoiture" class="table table-dark table-bordered mt-3 text-center align-middle" style="display:none">
  <thead>
    <tr class="text-center align-middle">
      <th scope="col">ID</th>
      <th scope="col">Marque</th>
      <th scope="col">Modèle</th>
      <th scope="col">Matricule</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cars as $car)
    <tr>
      <th scope="row">{{$car->id}}</th>
      <th scope="row">{{$car->marque}}</th>
      <td>{{$car->modele}}</td>
      <td>{{$car->matricule}}</td>
      <td>{{$car->prix}}</td>
      <td>
        <img id="imageList" src="{{ asset('storage/'. $car->image) }}" alt="">
      </td>
      <td>
        <form action="{{route('car.destroy',$car->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                   <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
            </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <table id="dashpaiement" class="table table-dark table-bordered mt-3 text-center align-middle" style="display:none">
  <thead>
    <tr class="text-center align-middle">
      <th scope="col">Email</th>
      <th scope="col">Montant</th>
      <th scope="col">Date de paiement</th>
    </tr>
  </thead>
  <tbody>
    @foreach($userlocations as $userlocation)
    <tr>
      <th scope="row">{{$userlocation->user->email}}</th>
      <th scope="row">{{$userlocation->paiements->montant}}</th>
      <td>{{$userlocation->paiements->datedepaiement}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div id="dash" class="container text-center mt-3">
  <div class="row g-2">
    <div class="col-3 car me-5 mb-2">
      <div class="p-3">
        <p><span class="badge text-bg-success">{{$carNumber}}</span><br> Voiture totales</p>
      </div>
    </div>
    <div class="col-3 car me-5  mb-2">
      <div class="p-3"> <p><span class="badge text-bg-warning">{{$countMatricules}}</span><br> Voitures en location</p></div>
    </div>
    <div class="col-3 car me-5 mb-2">
      <div class="p-3"> <p><span class="badge text-bg-secondary">{{$restCar}}</span><br> Voitures disponibles</p></div>
    </div>
    <div class="col-4 car">
      <div class="p-3">
      <p>Compte</p>
     <h2><strong> {{$montantFormate}} FCFA</strong></h2></div>
    </div>
  </div>
  <div class="card mt-5 col-12">
    <h3 class="card-header">
      Supervision des clients
    </h3>
    <table class="table  table-striped " >
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Voiture</th>
      <th scope="col">Paiement</th>
    </tr>
  </thead>
  <tbody>
    @foreach($supervisionClients as $supervision)
    <tr>
      <th> {{$supervision->user->name}} </th>
      <td>{{$supervision->user->email}}</td>
      <td>{{$supervision->voitures->marque}}</td>
      <td>{{$supervision->paiements->montant}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>
</div>
<script>
      const dashlocation=document.getElementById("dashlocation");
      const dashvoiture=document.getElementById("dashvoiture");
      const dashpaiement=document.getElementById("dashpaiement");
      const dash=document.getElementById("dash");
      
      const alldash=document.getElementById("alldash");
      const voitureClick=document.getElementById("voitureClick");
      const paimentClick=document.getElementById("paimentClick");
      const locationClick=document.getElementById("locationClick");
    alldash.addEventListener("click",()=>{
        dash.style.display="block"
        dashlocation.style.display="none"
        dashvoiture.style.display="none"
        dashpaiement.style.display="none"
    })
   voitureClick.addEventListener("click",()=>{
        dashvoiture.style.display="table"
        dashlocation.style.display="none"
        dashpaiement.style.display="none"
        dash.style.display="none"
    })
   paimentClick.addEventListener("click",()=>{
        dashpaiement.style.display="table"
        dashvoiture.style.display="none"
        dashlocation.style.display="none"
        dash.style.display="none"
    })
   locationClick.addEventListener("click",()=>{
        dashlocation.style.display="table"
        dashpaiement.style.display="none"
        dashvoiture.style.display="none"
        dash.style.display="none"
    })
</script>
</body>
</html>
@endsection