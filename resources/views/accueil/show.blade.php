<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
</head>
<body>
    <style>
        /* From Uiverse.io by mi-series */ 
/* Body */
.container {
  display: grid;
  grid-template-columns: auto;
  gap: 0px;
 
}

hr {
  height: 1px;
  background-color: #E5C7C5;
  border: none;
}

.card {
  margin: auto;
  width: 400px;
  background: #fff;
  box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
}

.title {
  width: 100%;
  height: 40px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 20px;
  border-bottom: 1px solid #E5C7C5;
  font-weight: 700;
  font-size: 11px;
  color: #000000;
}

/* Cart */
.cart {
  border-radius: 19px 19px 0px 0px;
}

.cart .steps {
  display: flex;
  flex-direction: column;
  padding: 20px;
}

.cart .steps .step {
  display: grid;
  gap: 10px;
}

.cart .steps .step span {
  font-size: 13px;
  font-weight: 600;
  color: #000000;
  margin-bottom: 8px;
  display: block;
}

.cart .steps .step p {
  font-size: 11px;
  font-weight: 600;
  color: #000000;
}

/* Promo */
.promo form {
  display: grid;
  grid-template-columns: 1fr 80px;
  gap: 10px;
  padding: 0px;
}

.input_field {
  width: auto;
  height: 36px;
  padding: 0 0 0 12px;
  border-radius: 5px;
  outline: none;
  border: 1px solid #E5C7C5;
  background-color: #F4E2DE;
  transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
}

.input_field:focus {
  border: 1px solid transparent;
  box-shadow: 0px 0px 0px 2px #F3D2C9;
  background-color: #F4E2DE;
}

.promo form button {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 10px 18px;
  gap: 10px;
  width: 100%;
  height: 36px;
  background: #F3D2C9;
  box-shadow: 0px 0.5px 0.5px #F3D2C9, 0px 1px 0.5px rgba(239, 239, 239, 0.5);
  border-radius: 5px;
  border: 0;
  font-style: normal;
  font-weight: 600;
  font-size: 12px;
  line-height: 15px;
  color: #000000;
}

/* Checkout */
.payments .details {
  display: grid;
  grid-template-columns: 2fr 1fr;
  padding: 0px;
  gap: 5px;
}

.payments .details span:nth-child(odd) {
  font-size: 12px;
  font-weight: 600;
  color: #000000;
  margin: auto auto auto 0;
}

.payments .details span:nth-child(even) {
  font-size: 13px;
  font-weight: 600;
  color: #000000;
  margin: auto 0 auto auto;
}

.checkout .footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 10px 10px 20px;
  background-color: #ECC2C0;
}

.price {
  position: relative;
  font-size: 22px;
  color: #2B2B2F;
  font-weight: 900;
}

.checkout .checkout-btn {
    cursor: pointer;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  width: 150px;
  height: 36px;
  background: #F3D2C9;
  box-shadow: 0px 0.5px 0.5px #E5C7C5, 0px 1px 0.5px rgba(239, 239, 239, 0.5);
  border-radius: 7px;
  border: 1px solid #ECC2C0;
  color: #000000;
  font-size: 13px;
  font-weight: 600;
  transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
  
}
.checkout .checkout-btn:hover{
   background: white;
}
    </style>
    <!-- From Uiverse.io by mi-series --> 
<div class="container">
  <div class="card cart">
    <label class="title">Email : {{$user->email}}</label>
    <div class="steps">
      <div class="step">
        <div>
          <span>Voitures</span>
          <p>Marque : {{$location->voitures->marque}}</p>
          <p>Modèle : {{$location->voitures->modele}}</p>
        </div>
        <hr>
        <div>
          <span>Paiements</span>
          <p>Montant : {{$location->paiements->montant}}</p>
        </div>
        <hr>
        <hr>
        <div class="payments">
          <span>Plus d'informations</span>
          <div class="details">
            <span>Date de début:</span>
            <span>{{$location->datedebut}}</span>
            <span>Date de fin:</span>
            <span>{{$location->datefin}}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card checkout">
    <div class="footer">
      <button id="no-print" onclick="window.print();" class="checkout-btn">Imprimer</button>
    </div>
  </div>
</div>
</body>
</html>